(function () {
    const container = document.getElementById('formations-container');
    if (!container) return;

    // Detectar URL dinámica desde el atributo 'data-url' del script, o usar fallback
    const scriptTag = document.currentScript || document.querySelector('script[src*="widget-formations.js"]');
    const apiUrl = scriptTag ? scriptTag.getAttribute('data-url') : '/api/trainings';

    fetch(apiUrl)
        .then(response => response.json())
        .then(trainings => {
            if (trainings.length === 0) {
                container.innerHTML = '<p style="color:white; text-align:center;">No hay formaciones programadas próximamente.</p>';
                return;
            }

            // Estilos inline para asegurar compatibilidad sin CSS externo
            const tableStyle = "width:100%; border-collapse:collapse; color:white; font-family: 'Poppins', sans-serif; min-width: 800px;";
            const thStyle = "padding:15px; border:1px solid #333; background-color:black; color:white; font-weight:bold; text-transform:uppercase;";
            const tdStyle = "padding:10px; border:1px solid #333; height:80px; vertical-align:top; background-color:#111;";
            const titleTdStyle = "padding:15px; border:1px solid #333; background-color:black; font-weight:bold; vertical-align:middle; text-align:center; min-width:150px;";
            const linkStyle = "color:#eebb00; text-decoration:none; display:block; padding:5px; border-radius:4px; transition: background 0.2s;";

            let html = `
            <div class="formation-table-wrapper" style="overflow-x:auto; background: #000; padding: 20px;">
                <h2 style="text-align:center; color:white; font-family:'Poppins', sans-serif; margin-bottom:20px; font-size:2em;">Próximas Formaciones y Encuentros Académicos</h2>
                <table class="formation-table" style="${tableStyle}">
                    <thead>
                        <tr>
                            <th style="${thStyle}">Evento</th>
                            <th style="${thStyle}">Lunes</th>
                            <th style="${thStyle}">Martes</th>
                            <th style="${thStyle}">Miércoles</th>
                            <th style="${thStyle}">Jueves</th>
                            <th style="${thStyle}">Viernes</th>
                            <th style="${thStyle}">Sábado</th>
                            <th style="${thStyle}">Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            trainings.forEach(training => {
                if (!training.schedule || !Array.isArray(training.schedule)) return;

                // 1. Preparar datos con fechas parseadas correctamente
                const sessions = training.schedule.map(session => {
                    if (!session.date) return null;
                    const parts = session.date.split('-');
                    // Mes en constructor Date es 0-indexado
                    const d = new Date(parts[0], parts[1] - 1, parts[2]);
                    return { ...session, dateObj: d };
                }).filter(s => s !== null);

                // 2. Ordenar cronológicamente para asegurar orden correcto
                sessions.sort((a, b) => a.dateObj - b.dateObj);

                // 3. Agrupar sesiones por Semana (Semana inicia Lunes)
                const weeksMap = new Map();

                sessions.forEach(session => {
                    const d = session.dateObj;
                    // Lunes=0 ... Domingo=6 para nuestros cálculos, aunque getDay devuelve Domingo=0
                    // Ajuste: getDay() -> Dom=0, Lun=1... Sab=6
                    // Queremos: Lun=0, ..., Dom=6
                    const jsDay = d.getDay();
                    const dayIndex = (jsDay === 0) ? 6 : jsDay - 1;

                    // Calcular la fecha del Lunes de esta semana para usarla como clave
                    // Clona fecha actual
                    const mondayDate = new Date(d);
                    // Resta días para volver al lunes
                    mondayDate.setDate(d.getDate() - dayIndex);
                    mondayDate.setHours(0, 0, 0, 0);

                    const weekKey = mondayDate.getTime(); // Timestamp del lunes actúa como ID de semana

                    if (!weeksMap.has(weekKey)) {
                        weeksMap.set(weekKey, new Array(7).fill('')); // 7 celdas vacías
                    }

                    const weekCells = weeksMap.get(weekKey);

                    // Agregar contenido a la celda correspondiente (acumulativo por si hay eventos en mismo día)
                    weekCells[dayIndex] += `
                        <a href="${training.article_url}" target="_blank" style="${linkStyle}" onmouseover="this.style.backgroundColor='#222'" onmouseout="this.style.backgroundColor='transparent'">
                            <div style="font-weight:bold; font-size:1.5em; line-height:1.1;">${session.display_text}</div>
                            <div style="font-size:0.9em; color:#bbb; margin-top:4px;">${session.note || ''}</div>
                        </a>
                        <div style="height:5px;"></div>
                    `;
                });

                // 4. Renderizar Filas (Ordenadas por fecha de semana)
                const sortedWeeks = Array.from(weeksMap.entries()).sort((a, b) => a[0] - b[0]);

                sortedWeeks.forEach(([weekKey, cells], index) => {
                    // Mostrar Ciudad en todas las filas siempre
                    const cityName = training.city;

                    html += `
                        <tr>
                            <td style="${titleTdStyle}">
                                ${cityName}
                            </td>
                            ${cells.map(content => `<td style="${tdStyle}">${content}</td>`).join('')}
                        </tr>
                    `;
                });
            });

            html += `
                    </tbody>
                </table>
            </div>
            `;
            container.innerHTML = html;
        })
        .catch(err => console.error('Error loading trainings widget:', err));
})();
