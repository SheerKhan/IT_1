<?php require VIEW_DIR . '/header.php'; ?>


<p>Try to guess the right answer as many times as posible</p>

<form method="post" action="/">
    <!-- This is NOT A SAFE WAY of passing the answer around -->
    <input type="hidden" name="real_answer" value="<?= $realAnswer; ?>"/>

    <?php if (!empty($message)) { ?>
    <p class="message"><?= $message; ?></p>
    <?php } ?>

    <?php if (!empty($errors)) { ?>
    <p class="error"><?= implode('<br/>', $errors); ?></p>
    <?php } ?>

    <p>What is <?= $number1; ?> + <?= $number2; ?>?</p>
    <div><label for="answer">Answer:</label> <input type="text" id="answer" name="answer" autofocus/></div>
    <div><button type="submit">Submit answer</button></div>
</form>


<?php require VIEW_DIR . '/footer.php'; ?>
