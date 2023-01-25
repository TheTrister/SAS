<select name="jurusan" id="id_jurusan" class="btn btn-outline-info shadow border-primary" style="width: 100px;">
<option value="">testing...</option>
<?php if($kelas): ?>
<?php foreach($kelas as $key): ?>
<option value="<?php echo $key->id_kelas ?>"><?php echo $key->kelas ?></option>
<?php endforeach ?>
<?php endif ?>
</select>


<script type="text/javascript">
  /**** Specific JS for this page ****/
 $(document).ready(function () {

      

        // $('#sopt1').remove();
    });
</script>