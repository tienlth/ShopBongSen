<canvas id={{$id}} class="data-chart"></canvas>

@push('script')
<script>
    dataBarChart = {
        labels: {{$labelChart["$labels"]}},
        datasets: [
            @foreach($datasets as $dataset)
                {
                    label: '{{$dataset["label"]}}',
                    backgroundColor: '{{$dataset["backgroundColor"]}}',
                    borderColor: '{{$dataset["borderColor"]}}',
                    data: {{$dataChart[$dataset["data"]]}}
                },
            @endforeach 
        ]
    }

    configBarChart = {
        type: '{{$type}}',
        data: dataBarChart,
        options: {
            indexAxis: 'x'
        }
    }

    new Chart(
        $('#{{$id}}')[0],
        configBarChart
    )
</script>
@endpush