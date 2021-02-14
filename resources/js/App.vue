<template>
    <div class="container">
        <el-form label-width="120px" inline @submit="doSearch">
            <el-form-item label="Name" class="form-item">
                <el-input v-model="filters.name" clearable></el-input>
            </el-form-item>
            <el-form-item label="Bedrooms" :error="getError('bedrooms')">
                <el-input v-model="filters.bedrooms" clearable></el-input>
            </el-form-item>
            <el-form-item label="Bathrooms" :error="getError('bathrooms')">
                <el-input v-model="filters.bathrooms" clearable></el-input>
            </el-form-item>
            <el-form-item label="Storeys" :error="getError('storeys')">
                <el-input v-model="filters.storeys" clearable></el-input>
            </el-form-item>
            <el-form-item label="Garages" :error="getError('garages')">
                <el-input v-model="filters.garages" clearable></el-input>
            </el-form-item>
            <el-form-item label="Price from" :error="getError('price_from')">
                <el-input v-model="filters.price_from" clearable></el-input>
            </el-form-item>
            <el-form-item label="Price to" :error="getError('price_to')">
                <el-input v-model="filters.price_to" clearable></el-input>
            </el-form-item>
            <el-form-item>
                <el-button class="search-btn" type="primary" @click="doSearch" :loading="loading">Search</el-button>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="resetFilters" :loading="loading">Reset filters</el-button>
            </el-form-item>
        </el-form>

        <el-table
            v-loading="loading"
            :data="tableData"
            style="width: 100%">
            <el-table-column
                prop="name"
                label="Name">
            </el-table-column>
            <el-table-column
                prop="price"
                label="Price"
                width="180">
            </el-table-column>
            <el-table-column
                prop="bedrooms"
                label="Bedrooms"
                width="180">
            </el-table-column>
            <el-table-column
                prop="bathrooms"
                label="Bathrooms"
                width="180">
            </el-table-column>
            <el-table-column
                prop="storeys"
                label="Storeys"
                width="180">
            </el-table-column>
            <el-table-column
                prop="garages"
                label="Garages"
                width="180">
            </el-table-column>
        </el-table>
    </div>


</template>


<script>
import {defineComponent, reactive, ref} from "vue";
import pickBy from 'lodash/pickBy';
import axios from "axios";
import {useFormErrors} from "./formErrors";

export default defineComponent({
    name: 'App',
    setup() {
        const loading = ref(false);
        const tableData = ref([])


        const initialFilters = {
            name: '',
            bedrooms: '',
            bathrooms: '',
            storeys: '',
            garages: '',
            price_from: '',
            price_to: '',
        }

        const filters = reactive({...initialFilters})

        const { getError, setErrors, clearErrors } = useFormErrors()

        const resetFilters = async () => {
            Object.assign(filters, initialFilters)
            await doSearch();
        }

        const doSearch = async () => {
            clearErrors();
            loading.value = true
            try {
                const {data} = await axios.get('/api/houses/search', {
                    params: pickBy(filters, (p) => p !== null && p.length > 0 )
                });
                tableData.value = data.data
            } catch (error) {
                if('errors' in error.response.data) {
                    setErrors(error.response.data.errors)
                }
                console.log(getError('bedrooms'))
            } finally {
                loading.value = false
            }
        }

        return {
            filters,
            tableData,
            doSearch,
            resetFilters,
            loading,
            getError,
        }
    }
})
</script>


<style scoped>
.form-item {
    margin-bottom: 35px;
}
.container {
    margin: 30px;
}

.search-btn {
    margin-left: 40px;
}
</style>
