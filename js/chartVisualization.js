google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(reciever_chart);
var request

function reciever_chart() {
    request = $.ajax({
        url: 'include/chartVisualization.php',
        type: 'POST',
        data: '',
    })
    request.done(function (response) {
        statics = response.split(',')
        if (statics[0] == 'reciever') {
            
            // alert(statics[1])
            // alert(statics[2])
            // alert(statics[3])
            var data = google.visualization.arrayToDataTable([
                ['Reciever', 'Visuals', {
                    type: 'string',
                    role: 'tooltip'
                }],
                ['Applications\nSubmitted', parseInt(statics[1]), "Submitted but not received/rejected"],
                ['Applications\nReceived', parseInt(statics[3]), "Submitted and received by me"],
                ['Applications\nRejected', parseInt(statics[2]), "Submitted and rejected by me"],
            ]);
            var options = {
                title: 'Reciever\'s work Analysis',
                chartArea: {
                    left: 0,
                    top: 20,
                    width: "400",
                    height: "700",
                },
                is3D:true,
                colors: ['orange', 'green', 'red'],
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    fontSize: 15
                },
                legend: {
                    position: 'labeled',
                    // alignment:'end'
                }
            };
            red = 0;
            yellow = 0;
            green = 0;
            for (i = 4; i < statics.length - 1; i++) {
                if (statics[i] <= 5)
                    green++
                else if (statics[i] > 5 && statics[i] <= 15)
                    yellow++
                else
                    red++
            }
            var data4 = google.visualization.arrayToDataTable([
                ['', 'Applications', { role: 'style' } ],
                ['0-5 Days', green, 'green'],
                ['5-15 Days', yellow, 'yellow'],
                ['> 15 Days', red, 'red'],
             ]);
            var options4 = {
                title:"Applications in process",
                chartArea: {
                    left: 20,
                    top: 20,
                    bottom:20,
                    width: "400",
                    height: "700",
                },
            };
            var chart4 = new google.visualization.ColumnChart(document.getElementById('chart4'));
            chart4.draw(data4,options4 );
        } else if (statics[0] == 'reviewer') {
            // alert(statics)
            application_type = statics[1]
            var data = google.visualization.arrayToDataTable([
                ['Reciever', 'Visuals', {
                    type: 'string',
                    role: 'tooltip'
                }],
                ['Applications Type ' + application_type + ' Received', parseInt(statics[5]), "Recieved but not reviewed by me"],
                ['Applications Type ' + application_type + ' Accepted', parseInt(statics[6]), "Recieved and accepted by me"],
                ['Applications Type ' + application_type + ' Rejected', parseInt(statics[7]), "Recieved and rejected by me"],
            ]);
            var options = {
                title: 'Reviewer\'s work Analysis',
                chartArea: {
                    left: 0,
                    top: 20,
                    width: "400",
                    height: "700",
                },
                is3D:true,
                colors: ['orange', 'green', 'red'],
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    fontSize: 15
                },
                legend: {
                    position: 'labeled'
                }
            };
            var data2 = google.visualization.arrayToDataTable([
                ['Reciever', 'Visuals', {
                    type: 'string',
                    role: 'tooltip'
                }],
                ['Applications\nSubmitted', parseInt(statics[2]), "Submitted but not received/rejected"],
                ['Applications\nReceived', parseInt(statics[4]), "Submitted and received by receiver"],
                ['Applications\nRejected', parseInt(statics[3]), "Submitted and rejected by receiver"],
            ]);
            var options2 = {
                title: 'Reciever\'s work Analysis',
                chartArea: {
                    left: 0,
                    top: 20,
                    width: "400",
                    height: "700",
                },
                is3D:true,
                colors: ['orange', 'green', 'red'],
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    fontSize: 15
                },
                legend: {
                    position: 'labeled'
                }
            };
            var chart2 = new google.visualization.PieChart(document.getElementById('chart2'));
            chart2.draw(data2, options2);
            red = 0;
            yellow = 0;
            green = 0;
            for (i = 8; i < statics.length - 1; i++) {
                if (statics[i] <= 5)
                    green++
                else if (statics[i] > 5 && statics[i] <= 15)
                    yellow++
                else
                    red++
            }
            var data4 = google.visualization.arrayToDataTable([
                ['', 'Applications', { role: 'style' } ],
                ['0-5 Days', green, 'green'],
                ['5-15 Days', yellow, 'yellow'],
                ['> 15 Days', red, 'red'],
             ]);
            var options4 = {
                title:"Applications in process",
                chartArea: {
                    left: 20,
                    top: 20,
                    bottom:20,
                    width: "400",
                    height: "700",
                },
            };
            var chart4 = new google.visualization.ColumnChart(document.getElementById('chart4'));
            chart4.draw(data4,options4 );
        } else if (statics[0] == 'approver') {
            // alert(statics)
            var data = google.visualization.arrayToDataTable([
                ['Reciever', 'Visuals', {
                    type: 'string',
                    role: 'tooltip'
                }],
                ['Applications Reviewed', parseInt(statics[4]), "Reviewed but not approved/disapproved by me"],
                ['Applications Approved', parseInt(statics[5]), "Reviewed and approved by me"],
                ['Applications DisApproved', parseInt(statics[6]), "Reviewed and disapproved by me"],
            ]);
            var options = {
                title: 'Approver\'s work Analysis',
                chartArea: {
                    left: 0,
                    top: 20,
                    width: "400",
                    height: "700",
                },
                is3D:true,
                colors: ['orange', 'green', 'red'],
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    fontSize: 15
                },
                legend: {
                    position: 'labeled'
                }
            };
            var data3 = google.visualization.arrayToDataTable([
                ['Reciever', 'Visuals', {
                    type: 'string',
                    role: 'tooltip'
                }],
                ['Applications\nSubmitted', parseInt(statics[1]), "Submitted but not received/rejected"],
                ['Applications\nReceived', parseInt(statics[3]), "Submitted and received by receiver"],
                ['Applications\nRejected', parseInt(statics[2]), "Submitted and rejected by receiver"],
            ]);
            var options3 = {
                title: 'Reciever\'s work Analysis',
                chartArea: {
                    left: 0,
                    top: 20,
                    width: "400",
                    height: "700",
                },
                is3D:true,
                colors: ['orange', 'green', 'red'],
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    fontSize: 15
                },
                legend: {
                    position: 'labeled'
                }
            };
            var chart3 = new google.visualization.PieChart(document.getElementById('chart3'));
            chart3.draw(data3, options3);
            var data2 = google.visualization.arrayToDataTable([
                ['Reciever', 'Visuals', {
                    type: 'string',
                    role: 'tooltip'
                }],
                ['Applications\nReceived', parseInt(statics[7]), "Received but not reviewed by all reviewers"],
                ['Applications\nReviewed', parseInt(statics[8]), "Received and reviewed by all reviewers"],
            ]);
            var options2 = {
                title: 'All Reviewers\'s work Analysis',
                chartArea: {
                    left: 0,
                    top: 20,
                    width: "400",
                    height: "700",
                },
                is3D:true,
                colors: ['orange', 'green'],
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    fontSize: 15
                },
                legend: {
                    position: 'labeled'
                }
            };
            var chart2 = new google.visualization.PieChart(document.getElementById('chart2'));
            chart2.draw(data2, options2);
            red = 0;
            yellow = 0;
            green = 0;
            for (i = 9; i < statics.length - 1; i++) {
                if (statics[i] <= 5)
                    green++
                else if (statics[i] > 5 && statics[i] <= 15)
                    yellow++
                else
                    red++
            }
            var data4 = google.visualization.arrayToDataTable([
                ['', 'Applications', { role: 'style' } ],
                ['0-5 Days', green, 'green'],
                ['5-15 Days', yellow, 'yellow'],
                ['> 15 Days', red, 'red'],
             ]);
            var options4 = {
                title:"Applications in process",
                chartArea: {
                    left: 20,
                    top: 20,
                    bottom:20,
                    width: "400",
                    height: "700",
                },
            };
            var chart4 = new google.visualization.ColumnChart(document.getElementById('chart4'));
            chart4.draw(data4,options4 );
            // alert(red)
            // alert(yellow)
            // alert(green)
        }
        var chart = new google.visualization.PieChart(document.getElementById('chart1'));
        chart.draw(data, options);
    })
}