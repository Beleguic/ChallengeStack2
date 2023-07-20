<?php if(!empty($errors)): ?>
<?php print_r($errors);?>
<?php endif;?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["divs"] as $name=>$configInput): ?>

        <div
            id="<?= $configInput["id"]?>"
            class="<?= $configInput["class"] ?>"
        >
        <?php if(isset($configInput['inside']) && sizeof($configInput['inside']) > 0): ?>
            <?php foreach ($configInput['inside'] as $name) : ?>
                <?php if(isset($config["inputs"][$name])) : ?>
                    <div
                        <?php if(isset($config["inputs"][$name]['divId'])): ?>
                            id="<?=$config["inputs"][$name]['divId'] ?>"
                        <?php endif; ?>
                        <?php if(isset($config["inputs"][$name]['divClass'])): ?>
                            class="<?=$config["inputs"][$name]['divClass'] ?>"
                        <?php endif; ?>
                        >
                        <?php if(isset($config["inputs"][$name]['label'])) : ?>
                            <?php $labelVal = $config["inputs"][$name]['label']; ?>
                            <label
                                id="<?= $labelVal["id"]?>"
                                class="<?= $labelVal["class"] ?>"
                                for="<?= $labelVal["for"] ?>"
                            >
                            <?= $labelVal["value"] ?>
                            </label>
                        <?php endif;?>
                        <?php $inputVal = $config["inputs"][$name]; ?>
                        <?php if(isset($config["inputs"][$name]['balise'])): ?>
                            <?php if($config["inputs"][$name]['balise'] == "select"): ?>
                                <select
                                    name="<?= $name ?>"
                                    class="<?= $inputVal["class"] ?>"
                                    id="<?= $inputVal["id"] ?>"
                                >
                                <?php foreach ($this->data[$config["inputs"][$name]['value']] as $types): ?>
                                    <?php if($inputData[$name] == $types['value']): ?>
                                        <option value="<?= $types['value'] ?>" selected="selected"><?= $types['content'] ?></option>
                                    <?php else:?>
                                        <option value="<?= $types['value'] ?>"><?= $types['content'] ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                                </select>
                            <?php elseif($config["inputs"][$name]['balise'] == "textarea"): ?>
                                <textarea
                                    name="<?= $name ?>"
                                    placeholder="<?= $inputVal["placeholder"] ?>"
                                    class="<?= $inputVal["class"] ?>"
                                    id="<?= $inputVal["id"] ?>"
                                    rows="<?= $inputVal["rows"] ?>"
                                ><?php   
                                    if(!isset($inputData[$name])){
                                        if(!isset($inputVal['value'])){
                                            $value = "";
                                        }
                                        else{
                                            $value = $inputVal['value'];
                                        }
                                    }
                                    else{
                                        $value = $inputData[$name];
                                    }
                                    ?><?= $value ?></textarea>
                            <?php endif;?>
                        <?php else: ?>
                            <input
                                <?php if($inputVal["type"] == 'file'): ?>
                                    <?php $fileInput = '[]'; ?>
                                <?php else: ?>
                                    <?php $fileInput = ""; ?>
                                <?php endif; ?>
                                name="<?= $name.$fileInput ?>"
                                placeholder="<?= $inputVal["placeholder"] ?>"
                                class="<?= $inputVal["class"] ?>"
                                id="<?= $inputVal["id"] ?>"
                                type="<?= $inputVal["type"] ?>"
                                <?php if(isset($inputVal['for'])): ?>
                                    list="<?= $inputVal["list"] ?>"
                                <?php endif; ?>
                                <?php   
                                    if(!isset($inputData[$name])){
                                        if(!isset($inputVal['value'])){
                                            $value = "";
                                        }
                                        else{
                                            $value = $inputVal['value'];
                                        }
                                    }
                                    else{
                                        $value = $inputData[$name];
                                    }
                                ?>
                                value="<?= $value ?>"
                                <?= $inputVal["required"]?"required":"" ?>
                                <?php if($inputVal["type"] == 'file'): ?>
                                    <?= $inputVal["multiple"]?"multiple":"" ?>
                                    accept="<?= $inputVal["accept"] ?>"
                                <?php endif; ?>
                            >
                            <?php if(isset($config["inputs"][$name]['div'])) : ?>
                                <?php $labelVal = $config["inputs"][$name]['div']; ?>
                                <div
                                    id="<?= $labelVal["id"]?>"
                                >
                                </div>
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                <?php endif;?>
             <?php endforeach;?>
        <?php endif;?>
        </div>
    <?php endforeach;?>
    <div id="div-register-submit-reset" class="div-form-50 d-flex justify-content-center">
        <?php if(isset($config["config"]["submit"])): ?>
            <?php foreach ($config["config"]["submit"] as $value): ?>
                <?php if(isset($config["submit"][$value])): ?>
                    <input type="submit" name="submit"
                        id="<?=$config["submit"][$value]["id"] ?>"
                        class="<?=$config["submit"][$value]["class"] ?>"
                        value="<?= $value ?>">
                <?php else: ?> 
                    <input type="submit" name="submit" value="<?= $value ?>">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($config["config"]["reset"])): ?>
            <?php if(isset($config["reset"][$config["config"]["reset"]])): ?>
                <input type="reset"
                    id="<?=$config["reset"][$config["config"]["reset"]]["id"] ?>"
                    class="<?=$config["reset"][$config["config"]["reset"]]["class"] ?>"
                    value="<?= $config["config"]["reset"] ?>">
            <?php else: ?> 
                <input type="reset" value="<?= $config["config"]["reset"] ?>">
            <?php endif; ?>
        <?php endif; ?>        
    </div>

</form>