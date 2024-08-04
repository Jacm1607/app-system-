<x-app-layout>
    
    <div class="p-6">
        <form action="#" method="get">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="grid grid-cols-4 gap-8 p-6">
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="date">Fecha inicio</label>
                            </p>
                            <p>
                                <input type="date" class="w-full rounded-xl text-gray-700" id="date1" name="date1" value="<?php echo date('Y-m-d');?>">
                            </p>
                        </div>
                        <div class=" col-span-1">
                            <p>
                                <label class="text-gray-700" for="date2">Fecha final</label>
                            </p>
                            <p>
                                <input type="date" class="w-full rounded-xl text-gray-700" id="date2" name="date2" value="<?php echo date('Y-m-d');?>">
                            </p>
                        </div>
                        <div class=" col-span-2 flex justify-end items-center">
                            <button type="submit" class="inline-flex h-[30px] items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ml-4">Filtrar</button>
                        </div>
                    </div>
                    <div class="flex">
                        
                        <div id="main" class="w-1/2 h-[400px] p-8"></div>
                    
                        <div id="main2" class="w-1/2 h-[400px] p-8"></div>
                    </div>
                    
                </div>
                <div class="col-span-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-6 text-2xl font-bold text-center text-black w-full">Productos con bajo stock</div>
                    <div id="main3" class="w-full h-[600px] p-8"></div>
                    <script>
                        let myChart3 = echarts.init(document.getElementById('main3'));
                        let option3 = {
                          tooltip: {
                            trigger: 'item'
                          },
                          legend: {
                            top: '5%',
                            left: 'center'
                          },
                          series: [
                            {
                              name: 'Producto',
                              type: 'pie',
                              radius: ['40%', '70%'],
                              avoidLabelOverlap: false,
                              itemStyle: {
                                borderRadius: 10,
                                borderColor: '#fff',
                                borderWidth: 2
                              },
                              label: {
                                show: false,
                                position: 'center'
                              },
                              emphasis: {
                                label: {
                                  show: true,
                                  fontSize: 40,
                                  fontWeight: 'bold'
                                }
                              },
                              labelLine: {
                                show: false
                              },
                              data:{!! json_encode($productos) !!}
                            }
                          ]
                        };
                        // {!! json_encode($productos) !!}
                        myChart3.setOption(option3);
                    </script>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
                      // Initialize the echarts instance based on the prepared dom
                      var myChart = echarts.init(document.getElementById('main'));
                      // Specify the configuration items and data for the chart
                      var option = {
                          title: {
                            text: 'Ventas'
                          },
                          tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                              type: 'cross',
                              label: {
                                backgroundColor: '#6a7985'
                              }
                            }
                          },
                          legend: {
                            data: ['Ventas']
                          },
                          toolbox: {
                            feature: {
                              saveAsImage: {}
                            }
                          },
                          grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                          },
                          xAxis: [
                            {
                              type: 'category',
                              boundaryGap: false,
                              data: ['{!! implode("','",$fechas_ventas)!!}']
                            }
                          ],
                          yAxis: [
                            {
                              type: 'value'
                            }
                          ],
                          series: [
                            {
                              name: 'Ventas',
                              type: 'line',
                              stack: 'Total',
                              areaStyle: {},
                              emphasis: {
                                focus: 'series'
                              },
                              data: [{!! implode(",",$cantidad_ventas)!!}]
                            }
                          ]
                        };
                
                      // Display the chart using the configuration items and data just specified.
                      myChart.setOption(option);
                    </script>
                    <script type="text/javascript">
                      // Initialize the echarts instance based on the prepared dom
                      var myChart2 = echarts.init(document.getElementById('main2'));
                      // Specify the configuration items and data for the chart
                      var option2 = {
                          title: {
                            text: 'Compras'
                          },
                          tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                              type: 'cross',
                              label: {
                                backgroundColor: '#6a7985'
                              }
                            }
                          },
                          legend: {
                            data: ['Compras']
                          },
                          toolbox: {
                            feature: {
                              saveAsImage: {}
                            }
                          },
                          grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                          },
                          xAxis: [
                            {
                              type: 'category',
                              boundaryGap: false,
                              data: ['{!! implode("','",$fechas_compras)!!}']
                            }
                          ],
                          yAxis: [
                            {
                              type: 'value'
                            }
                          ],
                          series: [
                            {
                              name: 'Compras',
                              type: 'line',
                              stack: 'Total',
                              areaStyle: {},
                              emphasis: {
                                focus: 'series'
                              },
                              data: [{!! implode(",",$cantidad_compras)!!}]
                            }
                          ]
                        };
                
                      // Display the chart using the configuration items and data just specified.
                      myChart2.setOption(option2);
                    </script>
</x-app-layout>
