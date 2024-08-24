    document.addEventListener('DOMContentLoaded', function () {
        fetch('../../../Back/Controllers/graficos/grafico_IngresosPorTiempo.php') 
            .then(response => response.json())
            .then(data => {
                const labels = data.map(entry => entry.mes);
                const valores = data.map(entry => entry.total);

                const ctx = document.getElementById('ingresosPorTiempoCanvas').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Ingresos Generados',
                            data: valores,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));

                fetch('../../../Back/Controllers/graficos/grafico_Popularidad.php') 
                    .then(response => response.json())
                    .then(data => {
                        const labels = data.map(entry => entry.tratamiento);
                        const valores = data.map(entry => entry.popularidad);
        
                        const ctx = document.getElementById('popularidadTratamientosCanvas').getContext('2d');
                        new Chart(ctx, {
                            type: 'pie', 
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Popularidad de Tratamientos',
                                    data: valores,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return tooltipItem.label + ': ' + tooltipItem.raw;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            

        

                    fetch('../../../Back/Controllers/graficos/grafico_IngresosServicios.php') 
                    .then(response => response.json())
                    .then(data => {
                        const labels = data.map(entry => entry.servicio);
                        const valores = data.map(entry => entry.total_ingresos);
        
                        const ctx = document.getElementById('ingresosPorServicioCanvas').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar', 
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Ingresos por Servicio',
                                    data: valores,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
    });

