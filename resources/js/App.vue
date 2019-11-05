<template>
    <div>
       <mu-container>
            <mu-bottom-nav>
                <router-link to="/songs" class="mr-3">
                    <mu-bottom-nav-item title="TimeLine" icon="restore"></mu-bottom-nav-item>
                </router-link>
                <router-link to="/search" class="mr-3">
                    <mu-bottom-nav-item title="Search" icon="favorite"></mu-bottom-nav-item>
                </router-link>
            </mu-bottom-nav>
        </mu-container>
        <router-view></router-view>
    </div>
</template>

<script>
    export default{
    }
</script>
