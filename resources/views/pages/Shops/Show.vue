<template>
    <Head :title="shop.title" />
    <div class="g-row">
        <h1>{{ shop.title }}</h1>
        <Link :href="`/shops/${shop.id}/edit/`" class="g-button outlined"> Редактировать </Link>
        <Link href="/shops/" class="right">
            <font-awesome-icon icon="rotate-left" />
            Вернуться к списку магазинов
        </Link>
    </div>
    <div class="g-row">
        <div class="size_6">
            <el-descriptions title="Данные магазина" column="1">
                <el-descriptions-item label="Название">
                    {{ shop.title }}
                </el-descriptions-item>
                <el-descriptions-item label="URL">
                    {{ shop.url }}
                </el-descriptions-item>
            </el-descriptions>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        shop: Object,
        initialFilter: {
            type: Object,
            default() {
                return {};
            },
        },
    },
    data() {
        return {
            filter: {
                daterange: this.initialFilter?.daterange || "",
                loading: false,
            },
        };
    },
};
</script>

<style scoped></style>
