<template>
  <!-- <div class="py-15"> -->
  <div>
    <!-- <v-layout row wrap justify-center>
      <v-flex xs3 sm3 md12 lg10 xl4> -->
    <v-layout row wrap justify-center class="mt-10">
      <v-flex xs11 sm11 md11 lg7 xl5 class="px-5">
        <!-- Profile image -->
        <div style="display: flex; justify-content: center">
          <v-avatar color="lighten-2" size="150">
            <v-img
              class="user-profile"
              loading="lazy"
              :lazy-src="
                user.photo ||
                'https://appvital.com/images/profile/file-uploader-api-profile-avatar-2.jpg'
              "
              :src="
                user.photo ||
                'https://appvital.com/images/profile/file-uploader-api-profile-avatar-2.jpg'
              "
              :alt="'@' + user.username + ' on Linktree'"
            ></v-img>
          </v-avatar>
        </div>
        <!-- / Profile image -->
        <!-- Username -->
        <br />
        <div style="display: flex; justify-content: center">
          <a
            :href="user.username"
            :style="`
                        color: ${user.customization.usernameFontColor};
                    `"
            class="
              text-center text-decoration-none
              font-weight-bold
              mt-2
              text-h6
            "
            >{{ "@" + user.username }}</a
          >
        </div>

        <p class="text-center caption mt-2" style="font-size: 15px !important">
          {{ user.description }}
        </p>

        <!-- test -->
        <!-- <header>
  <h2 contentEditable role='textbox' aria-multiline='true'>And stay alive...</h2>
</header> -->

        <!-- / Username -->
        <div v-if="user.links.length == 0">
          <p class="text-center">This user has no links yet.</p>
        </div>

        <!-- Links -->
        <div class="justify-center">
          <v-btn
            @mousemove="onMouseOver(link.id)"
            @mouseout="onMouseOut(link.id)"
            ref="button"
            v-for="(link, index) in SortBylinksOrder(links)"
            :id="link.id"
            :key="index"
            @click="analytic(link)"
            block
            class="main-btn my-3"
            elevation="0"
            large
            style="height: 100px"
            :style="`
                        font-size: ${user.customization.fontSize}px;
                        font-weight: ${user.customization.fontWeight};
                        background: ${user.customization.buttonBackground};
                        border: ${user.customization.buttonBorderSize}px solid ${user.customization.buttonBorder};
                        color: ${user.customization.fontColor};
                        border-radius: ${user.customization.borderRadius}px;
                    `"
          >
            {{ link.name }}
          </v-btn>
        </div>

        <!-- / Links -->

        <!-- Social media links -->
        <div
          v-if="social"
          :style="`display: flex; justify-content: center; margin-top: 40px; margin-bottom: 15px;`"
        >
          <v-icon
            @click="goToSm('facebook')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="outlined mx-2 text-h4 zoom"
            v-if="social.facebook"
          >
            mdi-facebook
          </v-icon>
          <v-icon
            @click="goToSm('twitter')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.twitter"
          >
            mdi-twitter
          </v-icon>

          <v-icon
            @click="goToSm('youtube')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.youtube"
          >
            mdi-youtube
          </v-icon>

          <v-icon
            @click="goToSm('instagram')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.instagram"
          >
            mdi-instagram
          </v-icon>

          <v-icon
            @click="goToSm('twitch')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.twitch"
          >
            mdi-twitch
          </v-icon>

          <v-icon
            @click="goToSm('linkedin')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.linkedin"
          >
            mdi-linkedin
          </v-icon>

          <v-icon
            @click="goToSm('gmail')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.gmail"
          >
            mdi-gmail
          </v-icon>

          <!--  -->

          <v
            @click="goToSm('tiktok')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.tiktok"
          >
            <i
              class="material-icons"
              style="cursor: pointer; font-size: 34px; padding-top: 10px"
              >tiktok</i
            >
          </v>

          <v
            @click="goToSm('line')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.line"
          >
            <i
              class="fab fa-line"
              style="cursor: pointer; font-size: 34px; padding-top: 10px"
            ></i>
          </v>

          <v
            @click="goToSm('telegram')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.telegram"
          >
            <i
              class="fab fa-telegram-plane"
              style="cursor: pointer; font-size: 34px; padding-top: 10px"
            ></i>
          </v>

          <v
            @click="goToSm('paypal')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.paypal"
          >
            <!-- mdi-paypal -->
            <i
              class="material-icons"
              style="cursor: pointer; font-size: 34px; padding-top: 10px"
              >paypal</i
            >
          </v>

          <v-icon
            @click="goToSm('whatsapp')"
            :style="`color: ${user.customization.iconColor}!important`"
            class="mx-2 text-h4 zoom"
            v-if="social.whatsapp"
          >
            mdi-whatsapp
          </v-icon>
        </div>
        <div style="display: flex; justify-content: center">
          <a href="/">
            <v-img
              style="mix-blend-mode: difference; "
              contain
              :src="JSON.parse(website).logo"
              class="linkPageLogo"
            ></v-img>
          </a>
        </div>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "LinkPage",
  props: ["user", "website", "auth"],
  computed: {
    links() {
      console.log(this.user.links);
      return this.user.links.filter((link) => link.is_active == true);
    },
    social() {
      return this.user.social;
    },
  },
  methods: {
    onMouseOut(buttonId) {
      let customization = this.user.customization;
      if (customization) {
        let button = document.getElementById(`${buttonId}`);
        // Typographie
        button.style.fontSize = customization.fontSize;
        button.style.fontWeight = customization.fontWeight;
        button.style.color = customization.fontColor;
        button.style.backgroundColor = customization.buttonBackground;
        button.style.border =
          customization.buttonBorderSize +
          "px solid " +
          customization.buttonBorder;
      }
    },

    SortBylinksOrder(arr) {
      return arr.slice().sort((a, b) => {
        return a.order - b.order;
      });
    },

    onMouseOver(buttonId) {
      let customization = this.user.customization;
      if (customization) {
        let button = document.getElementById(`${buttonId}`);
        button.style.fontSize = customization.fontSizeHover;
        button.style.fontWeight = customization.fontWeightHover;
        button.style.color = customization.fontColorHover;
        button.style.backgroundColor = customization.buttonBackgroundHover;
        button.style.border =
          customization.buttonBorderSizeHover +
          "px solid " +
          customization.buttonBorderHover;
      }
    },
    isUrl(value) {
      const pattern = new RegExp(
        "^(https?:\\/\\/)?" +
          "^(http?:\\/\\/)?" + // protocol
          "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
          "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
          "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
          "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
          "(\\#[-a-z\\d_]*)?$",
        "i"
      ); // fragment locator
      return pattern.test(value);
    },
    analytic(link) {
      console.log(this.auth);
      if (this.auth == undefined) {
        axios
          .put("/clicks/add", link)
          .then((res) => {
            window.location.href = link.link;
          })
          .catch((err) => {
            //
          });
      } else {
        window.location.href = link.link;
      }
    },
    goToSm(sm) {
      if (sm == "facebook") {
        // window.location.href = 'https://www.facebook.com/' + this.social.facebook
        window.open(
          "https://www.facebook.com/" + this.social.facebook,
          "_blank" // <- This is what makes it open in a new window.
        );
      }
      if (sm == "twitter") {
        // window.location.href = "https://www.twitter.com/" + this.social.twitter;
        window.open(
          "https://www.twitter.com/" + this.social.twitter,
          "_blank" // <- This is what makes it open in a new window.
        );
      }
      if (sm == "instagram") {
        // window.location.href =
        //   "https://www.instagram.com/" + this.social.instagram;
        window.open(
          "https://www.instagram.com/" + this.social.instagram,
          "_blank"
        );
      }
      if (sm == "linkedin") {
        // window.location.href =
        //   "https://www.linkedin.com/" + this.social.linkedin;
        window.open(
          "https://www.linkedin.com/" + this.social.linkedin,
          "_blank"
        );
      }
      if (sm == "tiktok") {
        // window.location.href = "https://www.tiktok.com/" + this.social.tiktok;
        window.open("https://www.tiktok.com/" + this.social.tiktok, "_blank");
      }
      if (sm == "youtube") {
        // window.location.href = "https://www.youtube.com/" + this.social.youtube;
        window.open("https://www.youtube.com/" + this.social.youtube, "_blank");
      }
      if (sm == "telegram") {
        // window.location.href = "https://www.t.me/" + this.social.telegram;
        window.open("https://www.t.me/" + this.social.telegram, "_blank");
      }
      if (sm == "twitch") {
        // window.location.href = "https://www.twitch.tv/" + this.social.telegram;
        window.open("https://www.twitch.tv/" + this.social.telegram, "_blank");
      }
      if (sm == "paypal") {
        // window.location.href = "https://www.paypal.com/" + this.social.paypal;
        window.open("https://www.paypal.com/" + this.social.paypal, "_blank");
      }

      if (sm == "line") {
        // window.location.href = "https://www.line.tv/" + this.social.line;
        window.open("https://www.line.tv/" + this.social.line, "_blank");
      }
      if (sm == "gmail") {
        // window.open("https://mail.google.com/" + this.social.gmail, "_blank");
        window.open(
          "mailto:youremail@example.com" + this.social.gmail,
          "_blank"
        );
      }
      if (sm == "whatsapp") {
        // window.open("https://www.gmail.com/" + this.social.gmail, "_blank");
        window.open("https://web.whatsapp.com/", "_blank");
      }
    },
  },
  created() {
    let customization = this.user.customization;
    // The page background
    if (this.isUrl(customization.pageBackground)) {
      document.getElementById(
        "app"
      ).style.backgroundImage = `url(${customization.pageBackground})!important`;
      document.body.style.backgroundImage = `url('${customization.pageBackground}')!important`;
    } else {
      document.getElementById(
        "app"
      ).style.background = `linear-gradient(45deg, ${customization.pageBackground[0]}, ${customization.pageBackground[1]})!important`;
    }

    // Increment the views of this link
    this.links.forEach((link) => {
      axios.put("/views/add", link).then((res) => {
        //
      });
    });
  },
};
</script>




<style>
.main-btn {
  transition: 0.2s;
}
.linkPageLogo {
  height: 30px;
  margin-top: 15px;
}
</style>