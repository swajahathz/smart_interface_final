 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
    
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


 function fetchData2(){
     
     const usernames = "test0003";

        setInterval(() => {
            fetch(`/bras_api/api.php?username=${usernames}`)
                .then(response => response.json())
                .then(data => {
                    
                     const downloadValue = (parseFloat(data.upload) / (1024 * 1024)).toFixed(2) || 0;
            
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
                 
        
                       const uploadValue = (parseFloat(data.download) / (1024 * 1024)).toFixed(2) || 0;
            
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
        
        
        console.log(data);
                })
                .catch(err => console.error(err));
        }, 1000);

     
 }



$("#realtime").on('click',function(){
    
  
        // Initial fetch
      fetchData2();
        
        // Set interval to fetch data every 1000 milliseconds (1 second)
        // setInterval(() => {
        //     fetchData2();
        // }, 1000);
})
 
 
 
