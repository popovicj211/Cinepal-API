<form method="POST" enctype="multipart/form-data" name="formUp" action="{{  route('update', ['id' => 9, 'img' => 11]) }}">
    {{ method_field('PUT') }}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
          <input type="text" name="upName" id="upName">
    <textarea  name="upDesc" id="upDesc" ></textarea>
     <input type="datetime-local" id="upRel" name="upRel">
    <input type="text" id="upRuntime" name="upRuntime">
     <select name="upYear">
              <option value="1"> 2020 </option>
         <option value="2"> 2019 </option>
         <option value="3"> 2018 </option>
     </select>
      <input type="checkbox" value="3" name="upCategory[]" id="upCategory1">
    <input type="checkbox" value="4" name="upCategory[]" id="upCategory2">
    <input type="checkbox" value="1" name="upActors[]" id="upActors1">
    <input type="checkbox" value="2" name="upActors[]" id="upActors2">
    <input type="submit" name="upSub" id="upSub"  >
</form>
