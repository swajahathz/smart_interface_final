 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
    
   var dom = document.getElementById('echart-gauge-basic');
var myChart = echarts.init(dom, null, {
    renderer: 'canvas',
    useDirtyRect: false
});
var option = {
    tooltip: {
        formatter: '{a} <br/>{b} : {c}%'
    },
    series: [
        {
            name: 'Pressure',
            type: 'gauge',
            progress: {
                show: true
            },
            detail: {
                valueAnimation: true,
                formatter: '{value}'
            },
            data: [
                {
                    value: 0, // Initial value
                    name: 'Download'
                }
            ]
        }
    ],
    color: ["#845adf"]
};

if (option && typeof option === 'object') {
    myChart.setOption(option);
}






// window.addEventListener('resize', myChart.resize);



var dom2 = document.getElementById('echart-gauge-basic2');
var myChart2 = echarts.init(dom2, null, {
    renderer: 'canvas',
    useDirtyRect: false
});
var option2 = {
    series: [
        {
            detail: {
                valueAnimation: true,
                formatter: '{value}'
            },
            data: [
                {
                    value: 0, // Initial value
                    
                }
            ]
        }
    ],
    color: ["#845adf"]
};

if (option2 && typeof option2 === 'object') {
    myChart2.setOption(option);
}


// window.addEventListener('resize', myChart2.resize);

 function fetchData(nas,username){
     
      $.ajax({
        url: "/graph/"+nas+"/"+username,
        type: "GET",
        data: {
            nas: nas,
            id: username,
            host: host
        },
        dataType: "json",
        success: function (response) {
            // Assuming the response is like: { "download": 12345, "upload": 6789 }
            // $('#download').text(response.download + ' kbps');
            // $('#upload').text(response.upload + ' kbps');
            
            const downloadValue = (parseFloat(response.upload) / (1024 * 1024)).toFixed(2) || 0;
            
            // console.log(downloadValue);

            myChart.setOption({
                series: [{
                    min: 0,
                    max: 50,
                    data: [{ value: downloadValue, name: 'Download' }],
                    detail: {
                        formatter: '{value} MB',
                        fontSize: 16
                    },
                }],
                color: ["#E6533C"]
            });
            
            const uploadValue = (parseFloat(response.download) / (1024 * 1024)).toFixed(2) || 0;
            
            document.getElementById('realtime_download').innerText = downloadValue+' MB';
         document.getElementById('realtime_upload').innerText = uploadValue+' MB';
            
            
         myChart2.setOption({
                series: [{
                    min: 0,  // Set minimum value
                    max: 10, // Set maximum value
                    data: [{ value: uploadValue}],
                    axisLabel: {
                        color: '#000', // Label color
                        fontSize: 9   // Change font size for 0, 50, and other labels
                    },
                    detail: {
                        formatter: '{value}',
                        fontSize: 15
                    },
                }],
                color:["#26BF94"]
            });
            
        },
        error: function (xhr, status, error) {
            $('#download').text('Error loading data');
            $('#upload').text('Error loading data');
            console.error("AJAX Error: ", status, error);
        }
    });
     
 }

 
$("#realtime").on('click',function(){
    
  
        // Initial fetch
        fetchData(nas, username);
        
        // Set interval to fetch data every 1000 milliseconds (1 second)
        setInterval(() => {
            fetchData(nas, username,host);
        }, 1000);
})
 
 
 
