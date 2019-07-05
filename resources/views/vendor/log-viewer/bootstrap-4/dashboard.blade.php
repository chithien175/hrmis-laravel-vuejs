@extends('log-viewer::bootstrap-4._master')

@section('content')
    <div class="row">
        <div class="col-md-3 pl-0">
            <canvas id="stats-doughnut-chart" height="300" class="mb-1"></canvas>
        </div>

        <div class="col-md-9 pl-0">
            <div class="row">
                @foreach($percents as $level => $item)
                    <div class="col-md-4 mb-1 p-1">
                        <div class="box level-{{ $level }} {{ $item['count'] === 0 ? 'empty' : '' }}">
                            <div class="box-icon">
                                {!! log_styler()->icon($level) !!}
                            </div>

                            <div class="box-content">
                                <span class="box-text">{{ $item['name'] }}</span>
                                <span class="box-number">
                                    {{ $item['count'] }} entries - {!! $item['percent'] !!} %
                                </span>
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            new Chart(document.getElementById("stats-doughnut-chart"), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
@endsection