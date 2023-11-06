<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
 <meta charset="utf-8">

 <title>Sistema de correspondencia</title>

 <style>
  .table-container {
   position: relative;
   overflow-x: auto;
   box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
   border-radius: 0.5rem;
  }

  .table {
   width: 100%;
   font-size: 14px;
   text-align: left;
   color: rgb(107, 114, 128);

  }

  .table__header {
   font-size: 12px;
   color: rgb(55, 65, 81);
   text-transform: uppercase;
   background-color: rgb(249, 250, 251);

  }

  .table__header-head {
   padding: 12px 24px;
  }

  .table__row {
   background-color: white;
   border-bottom-width: 1px;
  }

  .table__row-head {
   padding: 16px 24px;
   font-weight: 500;
   color: rgb(17, 24, 39);
   white-space: nowrap;
   border-bottom: 1px solid gainsboro;
  }

  .table__row-data {
   padding: 16px 24px;
   border-bottom: 1px solid gainsboro;
   
  }

  .head{
    display: flex;
    width: 100%;
  }

  .title
  {
    font-size: 1.5rem
  }

  .main{
    font-family: helvetica
  }
 </style>
</head>

<body class="font-sans antialiased">
 <main class="main">

    <div class="head">
        <div class="">
            <p class="title">Entrega de documentación fiscalía</p>
  
            <p><b>Primer corte:</b> 9:00 am - 12:00 pm</p>
            <p><b>Segundo corte:</b> 12:00 pm - 3:00pm</p>
            <p><b>Tercer corte:</b> 6:00 pm</p>
        </div>
        
        <div>
            <p><b>Entregado:</b> {{\Carbon\Carbon::today()->format('d-m-Y')}}</p>
            
        </div>


    </div>
 
  <div class="table-container">
   <table class="table">
    <thead class="table__header">
     <tr>
      <th scope="col" class="table__header-head">
       Folio
      </th>
      <th scope="col" class="table__header-head">
       Fecha
      </th>
      <th scope="col" class="table__header-head">
       Emisor
      </th>
      <th scope="col" class="table__header-head">
       Puesto del emisor
      </th>
      <th scope="col" class="table__header-head">
        Tema
       </th>
       <th scope="col" class="table__header-head">
        Área asignada
       </th>
       <th scope="col" class="table__header-head">
        Firma del área
       </th>
       <th scope="col" class="table__header-head">
        Observaciones
       </th>
     </tr>
    </thead>
    <tbody>
     @foreach ($data as $data)
     <tr class="table__row">
        <th scope="row" class="table__row-head">
         {{$data->folio}}
        </th>
        <td class="table__row-data">
         {{$data->date}}
        </td>
        <td class="table__row-data">
         {{$data->sender}}
        </td>
        <td class="table__row-data">
         {{$data->sender_position}}
        </td>
        <td class="table__row-data">
         {{$data->subject}}
        </td>
        <td class="table__row-data">
         {{$data->area->name}}
        </td>
        <td class="table__row-data">
         
        </td>
        <td class="table__row-data">
         
        </td>
       </tr>
     @endforeach
    </tbody>
   </table>
  </div>

 </main>

</body>

</html>
