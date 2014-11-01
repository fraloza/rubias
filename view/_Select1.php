<select name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $disabled; ?>  class="form-control" 
style="width: 84%;" >
    <?php foreach ($rows as $key => $value) { ?>
    <option value="<?php echo $value[0]; ?>"> <?php echo strtoupper(utf8_encode($value[1])) ?> </option>
    <?php } ?>
</select>
