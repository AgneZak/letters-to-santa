<h1 class="header header--main"><?php print $data['title']; ?></h1>
<h3 class="header"><?php print $data['heading']; ?></h3>
<section class="grid-container">

    <?php foreach ($data['items'] as $id => $wish): ?>
        <?php if (App\App::$session->getUser()): ?>

            <?php if (App\App::$session->getUser()['email'] === 'santa@santa.lt') : ?>

                <div class="grid-item">
                    <?php if ($wish['url'] != ''): ?>
                        <img class="product-img" src="<?php print $wish['url']; ?>" alt="">
                    <?php endif; ?>
                    <p><?php print $wish['wish']; ?></p>
                    <p><?php print $wish['price']; ?> $</p>

                    <?php if ($wish['fulfilled'] === 'false') : ?>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php print $id; ?>">
                            <button type="submit">Fulfill</button>
                        </form>
                    <?php endif; ?>

                </div>

            <?php elseif ($wish['option'] == 'public'): ?>

                <div class="grid-item">
                    <?php if ($wish['url'] != ''): ?>
                        <img class="product-img" src="<?php print $wish['url']; ?>" alt="">
                    <?php endif; ?>
                    <p><?php print $wish['wish']; ?></p>
                    <p><?php print $wish['price']; ?> $</p>
                    <p>Fulfilled: <?php print $wish['fulfilled']; ?></p>
                </div>

            <?php endif; ?>

        <?php elseif ($wish['option'] == 'public'): ?>

            <div class="grid-item">
                <?php if ($wish['url'] != ''): ?>
                    <img class="product-img" src="<?php print $wish['url']; ?>" alt="">
                <?php endif; ?>
                <p><?php print $wish['wish']; ?></p>
                <p><?php print $wish['price']; ?> $</p>
                <p>Fulfilled: <?php print $wish['fulfilled']; ?></p>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>

</section>
