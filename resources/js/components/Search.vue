<!--<template>-->

	<!--<ais-instant-search :search-client="searchClient" index-name="persons">-->
		<!--<ais-search-box></ais-search-box>-->

				<!--<ais-hits>-->

					<!--<template slot="item" slot-scope="{ item }">-->

						<!--<div class="col-md-4 mb-4 ">-->
							<!--<div class="card">-->
								<!--<img :src="item.photo" class="card-img-top">-->
								<!--<div class="card-body">-->
									<!--<h4 class="card-title">{{item.first_name}}{{item.last_name}}</h4><br>-->
									<!--<p class="card-text">-->
									<!--<address>-->
										<!--<strong>{{item.company}}</strong><br>-->
										<!--{{item.address}}<br>-->
										<!--{{item.address_2}}<br>-->
										<!--{{item.city}}{{item.state}}{{item.zip_code}}<br>-->
										<!--<abbr :title="item.phone">{{item.phone}}</abbr>-->
									<!--</address>-->
									<!--</p>-->

									<!--<a :href="'people/'+item.id" class="btn btn-primary">view</a>-->
								<!--</div>-->
							<!--</div>-->
						<!--</div>-->

					<!--</template>-->

				<!--</ais-hits>-->

	<!--</ais-instant-search>-->

<!--</template>-->

<!--<script>-->
	<!--import algoliasearch from 'algoliasearch/lite';-->

	<!--export default {-->
		<!--data() {-->
			<!--return {-->
				<!--searchClient: algoliasearch(-->
					<!--'B9UHBTXY61',-->
					<!--'876a4696065a1d4abc95568b67cb5fad',-->
				<!--),-->
			<!--};-->
		<!--},-->
	<!--};-->
<!--</script>-->

<!--<style>-->
	<!--body {-->
		<!--font-family: sans-serif;-->
		<!--padding: 1em;-->
	<!--}-->
<!--</style>-->
