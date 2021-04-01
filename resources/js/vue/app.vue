	<template>
  <div id="app">
    <div v-if="$store.state.user">
      <!--========== ADMIN SIDE MENU one ========-->
      <div class="_1side_menu" >
        <div class="_1side_menu_logo">
          <h3 style="text-align:center;">Logo Image</h3>
          <!--<img src="/img/logo.jpg" style="width: 108px;margin-left: 68px;"/>-->
        </div>

        <!--~~~~~~~~ MENU CONTENT ~~~~~~~~-->
        <div class="_1side_menu_content">
          <div class="_1side_menu_img_name">
            <!-- <img class="_1side_menu_img" src="/pic.png" alt="" title=""> -->
            <p class="_1side_menu_name">Admin</p>
          </div>
          <!--~~~ MENU LIST ~~~~~~-->
          <div class="_1side_menu_list">
            <ul class="_1side_menu_list_ul">
              <li v-for="(menuItem, index) in $userPermission" :key="index" v-if="$userPermission.length && menuItem.read"> 
                <router-link :to="menuItem.name">
              <Icon type="md-arrow-dropright" /> {{menuItem.contentName}}
                </router-link>
              </li>
              <!-- <li> <router-link to="/designs"><Icon type="md-aperture" />Designs</router-link></li>
              <li> <router-link to="/tags"><Icon type="md-pricetags" /> Tags</router-link></li>
              <li> <router-link to="/category"><Icon type="ios-git-network" /> Category</router-link></li>
              <li> <router-link to="/adminusers"><Icon type="md-person" /> Users</router-link></li>
              <li> <router-link to="/roles"><Icon type="md-contacts" /> Role Management</router-link></li>
              <li> <router-link to="/assignroles"><Icon type="ios-key" />Permssions</router-link></li> -->
              <li> <a href="logout"><Icon type="md-power" /> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--========== ADMIN SIDE MENU ========-->

      <!--========= HEADER ==========-->
      <div class="header">
        <div class="_2menu _box_shadow">
          <div class="_2menu_logo">
            <ul class="open_button">
              <li>
                <Icon type="ios-list" />
              </li>
              <!--<li><Icon type="ios-albums" /></li>-->
            </ul>
          </div>
        </div>
      </div>
      <!--========= HEADER ==========-->
    </div>
    	<router-view/>
  </div>
</template>
<script>
export default {
  methods:{
    checkProd(){
      this.isProd();
    }
  },
  created(){
    this.$store.commit('updateUser',this.$user);
    this.$store.commit('setUserPermission',this.$userPermission);
    console.log("this.$user", this.$user.id);
  }
}
</script>





