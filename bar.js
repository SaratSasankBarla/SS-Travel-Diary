let myBarChart;
function createBarChart() {
    // Extract labels and days from the fetched data
    const labels = Object.keys(user[0]).filter(key => key !== 's_no' && key !== 'dates');
    const days = user.map(item => item['place_name']); // Assuming 'dates' is a unique identifier for each day

    console.log("Labels are: ", labels);
    //console.log("Days are: ", days);

    const dataFromDatabase = days.reduce((result, day) => {
        // Find the item corresponding to the current day
        const dayItem = user.find(item => item['place_name'] === day);

        if (dayItem) {
            // Calculate the total for each category on the specific day
            const total = labels.reduce((acc, label) => acc + parseFloat(dayItem[label]), 0);

            // Map day to its total and add to the result object
            result[day] = total;
        } else {
            // Handle the case where there is no data for the current day
            result[day] = 0; // or any default value you prefer
        }

        return result;
    }, {});
    console.log("dataFromDatabase is: ", dataFromDatabase);

    // Extract values from the object
    const values = Object.values(dataFromDatabase);

    // Calculate the maximum and minimum values
    const maxValue = Math.max(...values);
    const minValue = Math.min(...values);

    console.log("BarChart - max: ",maxValue);
    console.log("BarChart - min: ",minValue);

    // Display dataFromDatabase in the console

    const barChart = document.getElementById('barChart');
    const barInfo = document.getElementById('barInfo');

    barInfo.textContent = `Max: $${maxValue} | Min: $${minValue}`;


    if (myBarChart) {
        myBarChart.destroy();
    }


    myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: Object.keys(dataFromDatabase),
            datasets: [{
                data: Object.values(dataFromDatabase),
                backgroundColor: ['#673AB7', '#3F51B5', '#9C27B0', '#2196F3', '#FF9800', '#607D8B'],
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        color: 'white' // Set x-axis text color to white
                    }
                },
                y: {
                    ticks: {
                        color: 'white' // Set y-axis text color to white
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'white' // Set legend text color to white
                    }
                }
            }
        }
    });


}
