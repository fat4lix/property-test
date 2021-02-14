<template>
    <div class="container">
        <el-form label-width="120px" inline>
            <el-form-item label="Name">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="Bedrooms">
                <el-input v-model="form.bedrooms"></el-input>
            </el-form-item>
            <el-form-item label="Bathrooms">
                <el-input v-model="form.bathrooms"></el-input>
            </el-form-item>
            <el-form-item label="Storeys">
                <el-input v-model="form.storeys"></el-input>
            </el-form-item>
            <el-form-item label="Garages">
                <el-input v-model="form.garages"></el-input>
            </el-form-item>
             <el-form-item label="Price from">
                <el-input v-model="form.price_from"></el-input>
            </el-form-item>
             <el-form-item label="Price to">
                <el-input v-model="form.price_to"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button class="search-btn" type="primary" @click="doSearch">Search</el-button>
            </el-form-item>
        </el-form>

        <el-table
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
    import { defineComponent, reactive, ref } from "vue";
    import axios from "axios";

    export default defineComponent({
        name: 'App',
        setup() {
            const tableData = ref([{
            price: '123412',
            name: 'Tom',
            bedrooms: '1',
            bathrooms: '1',
            storeys: '1',
            garages: '1',
          }])

          const doSearch = async () => {

              try {
                  const data = await axios.get('/api/houses/search');

                  console.log(data);
              } catch (error) {
                  
              }
             
          }
            const form = reactive({
                name: '',
                bedrooms: '',
                bathrooms: '',
                storeys:'',
                garages: '', 
                price_from: '',
                price_to: '',
            })
            return {
                form,
                tableData,
                doSearch
            }
        }
    })
</script>


<style scoped>
    .container {
        margin: 30px;
    }
    .search-btn {
        margin-left:  40px;
    }
</style>