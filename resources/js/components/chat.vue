<template>
    <div class="row m-3" dir="rtl" align="right">
        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">پیام ها</div>
                <div class="card-body p-0">
                    <ul class="list-unstyled" style="height: 300px; overflow-y: scroll">
                        <li class="p-2">
                            <strong>محمد جواد :</strong>
                            سلام
                        </li>
                    </ul>
                </div>
                <input type="text" name="message" placeholder="پیام خود را وارد کنید ..." class="form-control">
            </div>
            <span class="text-muted">محمد در حال تایپ ...</span>
        </div>

        <div class="col-4">
            <div class="card card-default">
                <div class="crad-header">کاربران آنلاین</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2">
                            محمد جواد
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
	export default {
		name: 'chat',
	};
</script>

<style scoped>

</style>
