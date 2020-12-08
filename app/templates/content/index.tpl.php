<h1 class="header header--main"><?php print $data['title']; ?></h1>
<h3 class="header"><?php print $data['heading']; ?></h3>
<section class="grid-container">

    <?php foreach ($data['items'] as $wish): ?>
        <?php if (App\App::$session->getUser()): ?>

            <?php if (App\App::$session->getUser()['email'] === 'santa@santa.lt') : ?>

                <div class="grid-item">
                    <?php if ($wish['url'] != ''): ?>
                        <img class="product-img" src="<?php print $wish['url']; ?>" alt="">
                    <?php endif; ?>
                    <p><?php print $wish['wish']; ?></p>
                    <p><?php print $wish['price']; ?> $</p>
                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php if ($wish['option'] == 'public'): ?>

            <div class="grid-item">
                <?php if ($wish['url'] != ''): ?>
                    <img class="product-img" src="<?php print $wish['url']; ?>" alt="">
                <?php endif; ?>
                <p><?php print $wish['wish']; ?></p>
                <p><?php print $wish['price']; ?> $</p>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>

</section>
