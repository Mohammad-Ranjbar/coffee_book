<template>

</template>

<script>
    export default {
        name: "Reply",
        props: ['attributes'],
	    // mounted () {
		//     // Do something useful with the data in the template
		//     console.log(this.attributes)
	    // },
        data() {
            return {
                editing: false,
                body: this.attributes.body
            }
        },
        methods: {
            update() {
                axios.patch('/replies/' + this.attributes.id, {
                    body: this.body
                });

                this.editing = false;
            },
            destroy() {
                axios.delete('/replies/' + this.attributes.id);

                $(this.$el).fadeOut(900);
                flash('پاسخ شما حذف گردید !');
            }
        }
    }
</script>

<style scoped>

</style>
