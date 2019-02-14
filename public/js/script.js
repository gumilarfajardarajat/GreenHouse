
function showMenu(pilih){
  var menu = document.getElementsByClassName("choose-btn");
  var menuTarget = document.getElementsByClassName("show-menu")

  for (let index = 0; index < menuTarget.length; index++) {
    if(pilih == index){
      // menuTarget[index].style.display = 'block';
      $(".show-menu:eq("+index+")").show(100);
      continue;
    }
    // menuTarget[index].style.display = 'none';
    $(".show-menu:eq("+index+")").hide(100);
  }
}

function hapusAnggota(route,name){
  console.log(route);
  console.log(name);
  document.getElementById('hapus-anggota').setAttribute('action',route);
  var now = document.getElementById('hapus-anggota').getAttribute('action');
  console.log(now);
}


var checkbox = document.getElementsByClassName('checkbox');
n = checkbox.length;
if(n >= 4){
  document.getElementById('modal-body').style.height = '250px';
  document.getElementById('modal-body').style.overflowY = "scroll";

}

function showUser(id) {
  $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

  });           
  
  $.ajax({
      type:'GET',
      url:route('getLaporanPerBulan'),
      data:{
        id: id,
      },
      success:function(data) {
         $("#target").html(data.html);
      }
   });
}

function getLaporanPerbulan() {

    var tanggal = $("option:selected").val()
    var objDate = new Date(tanggal);
    
    var y = (objDate.getFullYear());
    var m = (objDate.getMonth()+1);

    console.log(objDate);
    $.ajaxSetup({
  
        headers: {
  
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
        }
  
    });           
    
    $.ajax({
        type:'GET',
        url:route('getLaporanPerBulan',[y,m]),
        data:{

        },
        success:function(data) {
           $("#target").html(data.html);
           var ctCahaya = document.getElementById('cahayaChart').getContext('2d');
           var cahayaChart = new Chart(ctCahaya, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [{
                       label: "Intensitas Cahaya",
                       borderColor: 'rgb(255, 99, 132)',
                       data: data['cahaya'],
                       fill: false
                   },
                                 
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctSuhu = document.getElementById('suhuChart').getContext('2d');
           var suhuChart = new Chart(ctSuhu, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [
                   {
                       label: "Suhu",
                       borderColor: '#36A2EB',
                       data: data['suhu'],
                       fill: false
                   },
                                 
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctPh = document.getElementById('phChart').getContext('2d');
           var phChart = new Chart(ctPh, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [
                   {
                       label: "pH",
                       borderColor: '#FFCD56',
                       data: data['ph'],
                       fill: false
                   }, 
                                  
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctKt = document.getElementById('ktChart').getContext('2d');
           var ktChart = new Chart(ctKt, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [ 
                   {
                       label: "Kelembaban Tanah",
                       borderColor: '#4BC0C0',
                       data: data['kt'],
                       fill: false
                   },                                   
                 ]
               },
         
               // Configuration options go here
               options: {}
           });                                    
        }
     });
  }




  function getDetailMT() {
    $.ajaxSetup({
  
        headers: {
  
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
        }
  
    });           
    
    $.ajax({
        type:'GET',
        url:route('getDetailMT'),
        data:{

        },
        success:function(data){
            $("#cCahaya").html(data['cCahaya']+' lux');
            $("#cSuhu").html(data['cSuhu']+'° C');
            $("#cPh").html(data['cPh']);
            $("#cKt").html(data['cKt']+'%');
            var ctCahaya = document.getElementById('cahayaChart').getContext('2d');
            var cahayaChart = new Chart(ctCahaya, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Jam Ke-0","Jam Ke-6","Jam Ke-12","Jam Ke-18","Jam Ke-24"],
                   datasets: [{
                       label: "Intensitas Cahaya",
                       borderColor: 'rgb(255, 99, 132)',
                       data: data['cahaya'],
                       fill: false
                   },
                                 
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctSuhu = document.getElementById('suhuChart').getContext('2d');
           var suhuChart = new Chart(ctSuhu, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Jam Ke-0","Jam Ke-6","Jam Ke-12","Jam Ke-18","Jam Ke-24"],
                   datasets: [
                   {
                       label: "Suhu",
                       borderColor: '#36A2EB',
                       data: data['suhu'],
                       fill: false
                   },
                                 
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctPh = document.getElementById('phChart').getContext('2d');
           var phChart = new Chart(ctPh, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Jam Ke-0","Jam Ke-6","Jam Ke-12","Jam Ke-18","Jam Ke-24"],
                   datasets: [
                   {
                       label: "pH",
                       borderColor: '#FFCD56',
                       data: data['ph'],
                       fill: false
                   }, 
                                  
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctKt = document.getElementById('ktChart').getContext('2d');
           var ktChart = new Chart(ctKt, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Jam Ke-0","Jam Ke-6","Jam Ke-12","Jam Ke-18","Jam Ke-24"],
                   datasets: [ 
                   {
                       label: "Kelembaban Tanah",
                       borderColor: '#4BC0C0',
                       data: data['kt'],
                       fill: false
                   },                                   
                 ]
               },
         
               // Configuration options go here
               options: {}
           });                                    
        }
     });
  }

function updateState(dev,kondisi){
  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });           
    
    $.ajax({
        type:'PUT',
        url:'/state/'+dev+'/'+kondisi,
        success:function(data) {
            
        }
    });
}

function otParanet(){
  var at = document.getElementById('auto-paranet').checked;
  if(at){
      document.getElementById('paranet').disabled = true;
      document.getElementById('paranet').checked = false;
      updateState('paranet','auto');
  }else{
      document.getElementById('paranet').disabled = false;
      updateState('paranet','tutup');
  }
}

function paranet(){
  var at = document.getElementById('paranet').checked;
  if(at){
      updateState('paranet','buka');
      document.getElementById('auto-paranet').checked = false;

  }else{
      updateState('paranet','tutup');
  }
}

function penyiraman(){
    var at = document.getElementById('penyiraman').checked;
    if(at){
        updateState('relay','relay_on');
        document.getElementById('auto-penyiraman').checked = false;
  
        
    }else{
        updateState('relay','relay_off');
    }
  }


function otPenyiraman(){
  var at = document.getElementById('auto-penyiraman').checked;
  if(at){
      document.getElementById('penyiraman').disabled = true;
      document.getElementById('penyiraman').checked = false;
      updateState('relay','auto');
  }else{
      document.getElementById('penyiraman').disabled = false;
      updateState('relay','relay_off');
  }
}    

function getState(dev,kondisi){
    $.ajaxSetup({
  
          headers: {
  
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
          }
  
      });           
      
      $.ajax({
          type:'GET',
          url:'/getstate',
          success:function(data) {
                var paranet = data[0]['value'];
                var relay = data[1]['value'];

                if(paranet == 'auto'){
                    $('#auto-paranet').prop('checked',true);
                }else if(paranet == 'buka'){
                    $('#paranet').prop('checked',true);
                }

                if(relay == 'auto'){
                    $('#auto-penyiraman').prop('checked',true);
                }else if(relay == 'relay_on'){
                    $('#penyiraman').prop('checked',true);
                }                
          }
      });
  }

  function autoRefresh() {
    $.get(route('getDetailMT'), function(data) {
        console.log('refresh');
        $("#cCahaya").html(data['cCahaya']+' lux');
        $("#cSuhu").html(data['cSuhu']+'° C');
        $("#cPh").html(data['cPh']);
        $("#cKt").html(data['cKt']+'%');
        window.setTimeout(autoRefresh, 1000);
    });
  }


var pathname = window.location.href;
var admin_dashboard = route('admin_dashboard')['template'];
var home = route('home')['template'];

if((pathname == home)||(pathname == admin_dashboard)){
    getState();
    getDetailMT();
    autoRefresh();
    // setTimeout(function(){
    //     window.location.reload(1);
    //     }, 5000);        
}

function routeCheck(routeName){
    var pathname = window.location.href;
    if(pathname == routeName){
        return true
    }
    
    return false
}

if(routeCheck(route('index_laporan'))){
    $('option:first').trigger('change');
}



function printLaporan(){
    var tanggal = $("#tanggal").val()
    var date = new Date(tanggal);
    console.log(date);
    // console.log(date.getMonth()+1);
    // console.log(date.getFullYear());
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    // console.log(month);
    // console.log(year);
    console.log(route('printAnalisis',[1,2])['template']);
    window.location.href = '/printAnalisis/'+year+'/'+month;
}




    
    

    