<div>
  <input type="hidden" name="item[{{$index}}][files]"  value="{{$files}}">
  <x-laravelUltimateLibrary-file-select :key="'fileselect_'.$index"  :model="'files'" :value="$files" :type="'multi'"></x-laravelUltimateLibrary-file-select>
</div>
