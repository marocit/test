@extends('layouts.app')

@section('content')


<div class="panel-body" id="list-1" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
    <template v-for="tweet in items">
        <div class="list-group-item">
            <h4 class="list-group-item-heading">@{{ tweet.user_id }}</h4>
            <p>@{{ tweet.body }}</p>
            <div class="list-group-item-text panel panel-default">
                <div class="media">
                    <div class="media-middle">
                        <img class="media-object center-block" src="https://cdn.boogiecall.com/media/images/872398e3d9598c494a2bed72268bf018_1440575488_7314_s.jpg">
                    </div>
                    <div class="media-body panel-body">
                        <h3 class="media-heading">
                            Events, parties & live concerts in Melbourne
                        </h3>
                        <div>
                            List of events in Melbourne. Nightlife, best parties and concerts in Melbourne, event listings and reviews.
                        </div>
                    </div>
                </div>
            </div>
            <p class="list-group-item-text">@{{ tweet.created_at }}</p>
        </div>
    </template>
</div>

@endsection