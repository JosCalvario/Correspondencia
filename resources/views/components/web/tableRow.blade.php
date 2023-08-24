@props([
    'options' => 'false',
    'extra' => 'false'
])

<tr class="border-b text-sm text-gray-900 font-medium">
 {{ $tableData }}

 @if ($options == 'true')
  <td class="px-4 py-3 flex items-center justify-end">
   {{ $detailModal }}
  </td>
 @endif

 @if ($extra == 'true')
     <td class="px-4 py-3 flex items-center justify-end">
   {{ $extraModal }}
  </td>
     
 @endif

</tr>
