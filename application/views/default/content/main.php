<br><br>
<h1 class="header center green-text text-accent-4">MoviePedia</h1>
<div class="row center">
    <h5 class="header col s12 light">Don't just watching. Start Exploring.</h5>
</div>
<div class="row center">
    <div class="col s4"></div>
    <form class="col s4" method="POST" action="<?= base_url('search') ?>">
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="Enter a keyword..." name="keyword" type="text" class="validate">
                <!-- <label for="keyword">Enter a keyword</label> -->
            </div>
        </div>
        <div class="row">
            <button type="submit" name="search" value="search" class="btn-large waves-effect waves-light amber darken-2">Explore
                now.</a>
        </div>
    </form>
    <div class="col s4"></div>
</div>
<br><br>
