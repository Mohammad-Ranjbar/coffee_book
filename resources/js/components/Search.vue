<template>
	<ais-instant-search :search-client="searchClient" index-name="persons">
		<ais-search-box />
		<ais-hits>
			<template slot="item" slot-scope="{ item }">
				{{item.first_name}}
			</template>
		</ais-hits>
	</ais-instant-search>
</template>

<script>
	import algoliasearch from 'algoliasearch/lite';
	// import 'instantsearch.css/themes/algolia-min.css';

	export default {
		data() {
			return {
				searchClient: algoliasearch(
					'B9UHBTXY61',
					'876a4696065a1d4abc95568b67cb5fad'
				),
			};
		},
	};
</script>

<style>
	body {
		font-family: sans-serif;
		padding: 1em;
	}
</style>
