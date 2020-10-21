<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Pagination from '../partial/Pagination';
    export default {
        name: 'ExampleComponent',

        components: {
            Pagination,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
