<div class="cat-menu">
    <nav class="navbar navbar-default">
        <div class="container">

            <ul id="catbar" class="catbar">
                <ul class="nav navbar-nav nav-menu">

                    @foreach($categories as $category)
                    <li class="sub-cat-list">
                        <a href="">{{ $category->name }}</a>

                        <ul class="sub-cat-menu">
                            @foreach($category->children->chunk(4) as $chunk)
                                <div class="row">
                                    @foreach($chunk as $subcategory)
                                        <div class="col-md-6">
                                            <a href="{{ route('servicebysubcategory', $subcategory->sub_c_slug) }}">{{ $subcategory->sub_c_name }}</a>
                                        </div>
                                    @endforeach
                                </div>

                            @endforeach
                        </ul>
					</li>
                    @endforeach


                    <li class="sub-cat-list"><a href="">Others</a>

                        <ul class="sub-cat-menu">
                            @foreach($othersCategories as $other)
                                <li>
                                    <a href="#">{{ $other->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>



                </ul>

            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</div>
<script>
$( ".sub-cat-list" ).hover(function(e) {
	
	if((e.pageX + 550) >($(window).width())){
		var diff=($(window).width()-(e.pageX + 550)).toString()+"px";
	$( ".sub-cat-menu").css("margin-left",diff);

	}
	else{

	$( ".sub-cat-menu").css("margin-left","-20px");
	}
});
</script>
