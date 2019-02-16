<?PHP
get_header();

?>
<div class="container">
<?PHP

?>

    <div class="row">
        <div class="col-12">
    <?PHP
while(have_posts()){
    the_post();

    ?><h1><?PHP the_title(); ?></h1><?PHP
    the_content();
}
?>
        </div>
    </div>
</div>
<?PHP

get_footer();