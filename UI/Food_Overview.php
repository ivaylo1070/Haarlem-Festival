
    <div class="dropdown">
        <div class="form-group">
        <form action="/food" method="POST">
            <select name="filter" class="form-control" onchange="this.form.submit()">
            <?php if($filter != "") { ?> 
                <option value=""><?= $filter ?></option> 
            <?php } ?>
                <option value="">Show All</option>
                <option value="Dutch">Dutch</option>
                <option value="French">French</option>
                <option value="Modern">Modern</option>
                <option value="Fish and Seafood">Fish and Seafood</option>
                <option value="Argentinian">Argentinian</option>
                <option value="Steakhouse">Steak House</option>
                <option value="Internationaal, Aziatisch">Internationaal Aziatisch</option>
            </select>
        </form>
        </div>
    </div>
    
    <article class="flex-container">
        <?php foreach ($restaurants as $key => $restaurant) { ?>
        <a href="food/details/<?= str_replace(" ","-", $restaurant->getName()) ?>">
            <section class="product">
                <img class="restaurantImg" src="/image_uploads/<?= $restaurant->getImage() ?>" />
                <h3><?= $restaurant->getName(); ?></h3>
                <h4><?= $restaurant->getDescription(); ?></h4>
                <img class="ratings" src="/img/<?= $restaurant->getRating() ?>.png"/>
            </section>
        </a>
        <?php }?>
    </article>