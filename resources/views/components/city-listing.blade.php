<section id="our-services" class="block">
    <div class="container">
        <header class="section-title"><h2>{{ $title  }}</h2></header>
        <div class="row">
            @foreach($statisticsData as $statistics)
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-building-o"></i></figure>
                        <aside class="description">
                            <header>
                                <h3>
                                    {{ __('body.city_name_region_name', ['city' => $statistics->city->name, 'region' => $statistics->city->region->name]) }}
                                </h3>
                            </header>
                            <p>
                                {{ __('body.average_price', ['price' => $statistics->formattedPrice]) }}
                            </p>
                            <a href="{{ route('region.show', ['regionSlug' => $statistics->city->region->slug, 'date' => $currentDateHumanFormat]) }}" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
