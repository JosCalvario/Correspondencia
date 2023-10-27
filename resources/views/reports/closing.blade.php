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
  }

  .table__row-data {
   padding: 16px 24px;
   
  }
 </style>
</head>

<body class="font-sans antialiased">
 <main>

  <div class="table-container">
   <table class="table">
    <thead class="table__header">
     <tr>
      <th scope="col" class="table__header-head">
       Product name
      </th>
      <th scope="col" class="table__header-head">
       Color
      </th>
      <th scope="col" class="table__header-head">
       Category
      </th>
      <th scope="col" class="table__header-head">
       Price
      </th>
      <th scope="col" class="table__header-head">
       <span class="sr-only">Edit</span>
      </th>
     </tr>
    </thead>
    <tbody>
     <tr class="table__row">
      <th scope="row" class="table__row-head">
       Apple MacBook Pro 17"
      </th>
      <td class="table__row-data">
       Silver
      </td>
      <td class="table__row-data">
       Laptop
      </td>
      <td class="table__row-data">
       $2999
      </td>
     </tr>
    </tbody>
   </table>
  </div>

 </main>

</body>

</html>
