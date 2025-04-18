<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-statistic-card :name="'Active Licenes'" :color="'green'" :count="$active" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-statistic-card :name="'Inactive Licenes'" :color="'yellow'" :count="$inactive" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-statistic-card :name="'Expaired Licenes'" :color="'red'" :count="$expaired" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-statistic-card :name="'Companies'" :color="'gray'" :count="$companies" />
            </div>
        </div>

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="h-[400px] w-full p-4">
                <canvas id="licensesChart"></canvas>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const ctx = document.getElementById('licensesChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                            label: 'Licenses Created',
                            data: @json($chartData['licenses']),
                            backgroundColor: 'rgba(59, 130, 246, 0.6)', // Blue
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 1,
                            borderRadius: 8
                        },
                        {
                            label: 'Companies Created',
                            data: @json($chartData['companies']),
                            backgroundColor: 'rgba(16, 185, 129, 0.6)', // Green
                            borderColor: 'rgba(16, 185, 129, 1)',
                            borderWidth: 1,
                            borderRadius: 8
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#fff'
                            }
                        }
                    },
                    layout: {
                        padding: 20
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#fff'
                            },
                            grid: {
                                color: '#444'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#fff'
                            },
                            grid: {
                                color: '#444'
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</div>
