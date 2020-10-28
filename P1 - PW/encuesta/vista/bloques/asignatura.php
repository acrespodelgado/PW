<h2>Código asignatura</h2>
<table class="table table-bordered bordered">
 	<thead>
    <tr>
      <th scope="col">Titulación</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Grupo</th>
    </tr>
  </thead>
	<tbody>
  <?php for($i = 0; $i <= 9; $i++) {
  ?>
    <tr>
      <td>
        <div class="number">
          <input type="radio" name="ti-0" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
        <div class="number">
          <input type="radio" name="ti-1" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
        <div class="number">
          <input type="radio" name="ti-2" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
        <div class="number">
          <input type="radio" name="ti-3" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
      </td>
      <td>
        <div class="number">
          <input type="radio" name="as-0" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
        <div class="number">
          <input type="radio" name="as-1" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
        <div class="number">
          <input type="radio" name="as-2" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
      </td>
      <td>
        <div class="number">
          <input type="radio" name="gr-0" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
        <div class="number">
          <input type="radio" name="gr-1" value="<?php if($i == 0) echo 10; else echo $i; ?>"><?php echo $i; ?>
        </div>
      </td>
    </tr>
  <?php
  }
  ?>
  </tbody>
</table>