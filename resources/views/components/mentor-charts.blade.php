<script>
(function ($) {
    "use strict";

    /*--
        Apex Charts
    -----------------------------------*/

    var options = {
        series: [ {
            name: 'TEAM C',
            type: 'line',
            data: [0, 500, 50, 680, 210, 480, 310]
        }],
        chart: {
            height: 370,
            type: 'line',
            stacked: false,
            toolbar: {
                show: false,
            }
        },
        stroke: {
            width: [3],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },
        markers: {
            size: 0
        },
        colors: ['#309255'],
        xaxis: {
            categories: [
                ['Oct’20'],
                ['Nov’20'],
                ['Dec’20'],
                ['Jan’21'],
                ['Feb’21'],
                ['Mar’21'],
            ],
            labels: {
                style: {
                    colors: ['#52565b'],
                    fontSize: '14px',
                    fontFamily: 'Gordita',
                    fontWeight: 400,
                }
            }
        },
        yaxis: {
            tickAmount: 7,
            min: 0,
            labels: {
                style: {
                    colors: ['#52565b'],
                    fontSize: '14px',
                    fontFamily: 'Gordita',
                    fontWeight: 400,
                },
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y.toFixed(0) + " points";
                }
                return y;

                }
            }
            }
        };

        var chart = new ApexCharts(document.querySelector("#uniqueReport"), options);
        chart.render();
})(jQuery);
</script>


<div class="graph">
    <div class="graph-title">
        <h4 class="title">Get top insights about your performance</h4>

        <div class="months-select">
            <select class="selectpicker">
                <option data-display="Last 12 months">Last 12 months</option>
                <option value="1">Last 6 months</option>
                <option value="1">Last 3 months</option>
                <option value="1">Last 2 months</option>
                <option value="1">Last 1 months</option>
                <option value="1">Last 1 week</option>
            </select>
        </div>
    </div>

    <div class="graph-content">
        <div id="uniqueReport"></div>
    </div>

    <div class="graph-btn">
        <a class="btn btn-primary btn-hover-dark" href="#">Revenue Report <i class="icofont-rounded-down"></i></a>
    </div>
</div>
<!-- Graph Top End -->
