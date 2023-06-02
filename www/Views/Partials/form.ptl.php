<?php if(!empty($errors)): ?>
<?php print_r($errors);?>
<?php endif;?>


<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["inputs"] as $name=>$configInput): ?>

        <?php if ($configInput["balise"] == "input"): ?>

            <input
                name="<?= $name ?>"
                placeholder="<?= $configInput["placeholder"] ?>"
                class="<?= $configInput["class"] ?>"
                id="<?= $configInput["placeholder"] ?>"
                type="<?= $configInput["type"] ?>"
                <?= $configInput["required"]?"required":"" ?>
            >

        <?php elseif ($configInput["balise"] == "label"): ?>

            <label
                id="<?= $configInput["id"]?>"
                class="<?= $configInput["class"] ?>"
                for="<?= $configInput["for"] ?>"
            >
            <?= $configInput["value"] ?>
            </label>

        <?php elseif ($configInput["balise"] == "div"): ?>

            <div
                id="<?= $configInput["id"]?>"
                class="<?= $configInput["class"] ?>"
            >

        <?php elseif ($configInput["balise"] == "end-div"): ?>

            </div>

        <?php endif; ?>

    <?php endforeach;?>
    <div id="div-register-submit-reset" class="div-form-50">
        <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">
        <input type="reset" value="<?= $config["config"]["reset"] ?>">
    </div>

</form>