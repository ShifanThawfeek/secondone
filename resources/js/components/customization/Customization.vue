<template>
  <div>
    <v-layout row wrap justify-center class="mt-7">
      <v-flex xs11 sm11 md11 lg7 xl5 class="px-5">    

        <!-- Starter templates -->
        <!-- <v-card elevation="0" class="mb-5">
          <v-card-title>Starter templates</v-card-title>
          <v-divider></v-divider>
          <v-card-text>
            <v-form ref="themesForm" v-model="themesForm">
              <v-radio-group v-model="theme" :rules="[rules.required]">
                <v-radio label="Light" value="light"></v-radio>
                <v-radio label="Blue" value="blue"></v-radio>
              </v-radio-group>
              <div style="display: flex; justify-content: flex-end">
                <v-btn
                  color="cyan accent-3"
                  elevation="0"
                  class="white--text"
                  large
                  @click="saveTheme"
                  >Save</v-btn
                >
              </div>
            </v-form>
          </v-card-text>
        </v-card> -->
        <!-- / Starter templates -->

        <!-- Profile Image Upload -->
        <v-card elevation="0" class="mb-5">
          <v-card-title class="grey--text">Upload profile image</v-card-title>
          <v-card-text>
            <v-form ref="form" v-model="valid">
              <form enctype="multipart/form-data">
                <v-alert type="info" border="left" v-if="imageLoading"
                  >Uploading the image ...</v-alert
                >
                <errors
                  :success="imageSuccess"
                  :failure="imageFailure"
                  :message="imageMessage"
                ></errors>

                <v-file-input
                  v-model="profile"
                  accept="image/*"
                  label="Profile image"
                  :rules="[rules.required]"
                  outlined
                ></v-file-input>

                <v-btn
                  color="cyan accent-3"
                  elevation="0"
                  class="white--text"
                  large
                  @click="uploadImage"
                  >Save</v-btn
                >
              </form>
            </v-form>
          </v-card-text>
        </v-card>
        <!-- / Profile Image Upload -->

        <!-- Pre built themes -->
        <v-card elevation="0" class="mb-5">
          <v-flex lg12 class="px-5">
            <v-col class="shrink">
              <v-card-title>Themes</v-card-title>
              <v-divider></v-divider>

              <v-card-text>
                <v-form ref="themesForm" v-model="themesForm">
                  <v-radio-group v-model="theme" :rules="[rules.required]">
                    <!-- from here it will go live themes -->
                    <v-row ref="themesForm" v-model="themesForm">

                      <!-- Create Your Own Theme -->
                      <v-col cols="6" sm="4">
                      <v-img
                        src="https://www.mataonme.com/assets/images/create_your_own.png"
                        height="200px"
                        width="150px"
                        style="border: 1px solid #555"
                      >
                        <v-btn
                          href="#targetDiv"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            display: inline-block;
                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Create Your Own Theme
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        style="display: none"
                        label=""
                        value="light"
                      ></v-radio>
                    </v-col>

                      <!-- Light -->
                      <v-col cols="6" sm="4">
                      <v-img
                        src="https://www.mataonme.com/assets/images/light.png"
                        height="200px"
                        width="150px"
                      ></v-img>
                      <v-radio label="Light" value="light"></v-radio>
                    </v-col>

                      <!-- Blue -->
                      <v-col cols="6" sm="4">
                      <v-img
                        src="https://www.mataonme.com/assets/images/blue.png"
                        height="200px"
                        width="150px"
                      ></v-img>
                      <v-radio label="Blue" value="blue"></v-radio>
                    </v-col>

                      <!-- Purple Dream -->
                      <v-col cols="6" sm="4">
                        <v-img
                          src="https://www.mataonme.com/assets/images/_2.png"
                          height="200px"
                          width="150px"
                        ></v-img>
                        <v-radio label="Purple Dream" value="theme_4"></v-radio>
                      </v-col>

                      <!-- Shortcake -->
                      <v-col cols="6" sm="4">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_3.png"
                        height="200px"
                        width="150px"
                      >
                        <div class="fill-height bottom-gradient"></div>
                      </v-img>
                      <v-radio label="Shortcake" value="themeimage2"></v-radio>
                    </v-col>

                      <!-- Rainbow Sketch -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_4.png"
                        height="200px"
                        width="150px"
                      >
                      </v-img>
                      <v-radio
                        label="Rainbow Sketch"
                        value="themeimage"
                      ></v-radio>
                    </v-col>

                      <!-- Rainbow Sketch Go Pro-->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_4.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Rainbow Sketch"
                        value="themeimage"
                        disabled
                      ></v-radio>
                    </v-col>

                      <!-- Retro -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_5.png"
                        height="200px"
                        width="150px"
                      ></v-img>
                      <v-radio label="Retro" value="secondrow1"></v-radio>
                    </v-col>

                      <!-- Retro Go Pro-->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_5.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Retro"
                        value="secondrow1"
                        disabled
                      ></v-radio>
                    </v-col>

                      <!-- Diary Clouds -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_7.png"
                        height="200px"
                        width="150px"
                      >
                      </v-img>
                      <v-radio
                        label="Diary Clouds"
                        value="secondrow2"
                      ></v-radio>
                    </v-col>

                      <!-- Diary Clouds Go Pro-->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_7.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Diary Clouds"
                        value="secondrow2"
                        disabled
                      ></v-radio>
                    </v-col>

                      <!-- Mono.KR -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_8.png"
                        height="200px"
                        width="150px"
                      >
                      </v-img>
                      <v-radio label="Mono.KR" value="secondrow3"></v-radio>
                    </v-col>

                      <!-- Mono.KR Go Pro-->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_8.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Mono.KR"
                        value="secondrow3"
                        disabled
                      ></v-radio>
                    </v-col>

                      <!-- Peanut Butter -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_9.png"
                        height="200px"
                        width="150px"
                      ></v-img>
                      <v-radio
                        label="Peanut Butter"
                        value="thirdrow1"
                      ></v-radio>
                    </v-col>

                      <!-- Peanut Butter Go Pro-->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_9.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Peanut Butter"
                        value="thirdrow1"
                        disabled
                      ></v-radio>
                    </v-col>

                      <!-- Summer Pool -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_10.png"
                        height="200px"
                        width="150px"
                      >
                        <div class="fill-height bottom-gradient"></div>
                      </v-img>
                      <v-radio label="Summer Pool" value="thirdrow2"></v-radio>
                    </v-col>

                      <!-- Summer Pool Go Pro -->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_10.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Summer Pool"
                        value="thirdrow2"
                        disabled
                      ></v-radio>
                    </v-col>

                      <!-- Purple Journal -->
                      <v-col cols="6" sm="4" v-if="user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_11.png"
                        height="200px"
                        width="150px"
                      >
                      </v-img>
                      <v-radio
                        label="Purple Journal"
                        value="thirdrow3"
                      ></v-radio>
                    </v-col>

                      <!-- Purple Journal Go Pro-->
                      <v-col cols="6" sm="4" v-if="!user.is_subscribed">
                      <v-img
                        src="https://www.mataonme.com/assets/images/_11.png"
                        height="200px"
                        width="150px"
                      >
                        <v-btn
                          v-if="!user.is_subscribed"
                          href="/upgrade"
                          align="center"
                          justify="center"
                          color="#17d8e2"
                          style="
                            position: absolute;
                            transform: translate(-50%, -50%);
                            margin-right: -50%;
                            top: 50%;
                            left: 50%;

                            height: auto;
                            white-space: normal;
                          "
                        >
                          <v-img
                            icon
                            src="assets/images/lock.png"
                            class="ml-3 img-fluid"
                            width="25px"
                            height="25px"
                            style="
                              position: absolute;
                              transform: translate(-50%, -50%);
                              margin-right: -50%;
                              top: 50%;
                              left: 0%;
                            "
                          >
                          </v-img>
                          <p
                            style="
                              margin-bottom: 10px;
                              margin-top: 10px;
                              margin-left: 27px;
                            "
                          >
                            Pro
                          </p>
                        </v-btn>
                      </v-img>

                      <v-radio
                        label="Purple Journal"
                        value="thirdrow3"
                        disabled
                      ></v-radio>
                    </v-col>
                    </v-row>

                    <!-- end of here it will go live themes -->
                  </v-radio-group>

                  <div style="display: flex; justify-content: flex-end">
                    <v-btn
                      color="cyan accent-3"
                      elevation="0"
                      class="white--text"
                      large
                      @click="saveTheme"
                      >Save</v-btn
                    >
                  </div>
                </v-form>
              </v-card-text>
            </v-col>
          </v-flex>
        </v-card>
        <!-- / Pre built themes -->

        <!-- Customization -->
         <div id="targetDiv"></div>
        <v-card elevation="0" class="mb-5">
          <v-card-title class="grey--text"
            >Link page customization</v-card-title
          >
          <v-card-text v-if="user.is_subscribed">
            <v-form ref="form">
              <errors
                :success="customSuccess"
                :failure="customFailure"
                :message="customMessage"
              ></errors>
              <!-- Page Background Color -->
              <v-radio-group v-model="type" column>
                <v-radio
                  label="Colors"
                  value="color"
                  @click="pageBackground = defaultColor"
                ></v-radio>
                <v-radio
                  label="Image"
                  value="image"
                  @click="
                    (pageBackground = isUrl(customization.pageBackground)
                      ? customization.pageBackground
                      : 'https://resi.ze-robot.com/dl/4k/4k-desktop-wallpaper.-2560%C3%971440.jpg'),
                      (type = 'image')
                  "
                ></v-radio>
              </v-radio-group>
              <v-layout row wrap justify-center>
                <v-flex
                  xs12
                  sm12
                  md12
                  lg12
                  xl12
                  class="px-5"
                  v-if="type == 'color'"
                >
                  <div class="my-3">
                    <p class="text-body-1">Background</p>
                    <div v-if="pageBackground">
                      <p>Color name: {{ pageBackground.name }}</p>
                      <div>
                        <div
                          :style="`display: inline-block; height: 25px; width: 25px;background:${
                            pageBackground.colors[0] || '#F09819'
                          }`"
                        ></div>
                        <span>{{ pageBackground.colors[0] || "#F09819" }}</span>
                        <div
                          :style="`display: inline-block; height: 25px; width: 25px;background:${
                            pageBackground.colors[1] || '#EDDE5D'
                          }`"
                        ></div>
                        <span>{{ pageBackground.colors[1] || "#EDDE5D" }}</span>
                      </div>
                      <div
                        class="mb-3"
                        :style="`padding: 100px; width: 100%;background: linear-gradient(45deg, ${
                          pageBackground.colors[0] || '#F09819'
                        }, ${pageBackground.colors[1] || '#EDDE5D'}`"
                      ></div>
                      <v-btn @click="dialog = true" color="primary" outlined>
                        Choose colors
                      </v-btn>
                    </div>
                    <v-dialog max-width="70%" v-model="dialog">
                      <v-card>
                        <v-card-title>Choose a color</v-card-title>
                        <v-divider class="mb-3"></v-divider>
                        <v-card-text>
                          <div style="display: inline-block; width: 100%">
                            <div
                              class="mx-1"
                              :style="`cursor: pointer; padding: 65px; width: 30px; display: inline-block; background: linear-gradient(45deg, ${gradient.colors[0]}, ${gradient.colors[1]})`"
                              v-for="(gradient, index) in gradients"
                              :key="index"
                              @click="
                                (pageBackground = gradient), (dialog = false)
                              "
                            ></div>
                          </div>
                        </v-card-text>
                      </v-card>
                    </v-dialog>
                  </div>
                </v-flex>
                <!-- / Page Background Color -->
                <v-flex
                  xs12
                  sm12
                  md12
                  lg12
                  xl12
                  class="px-5"
                  v-if="type == 'image'"
                >
                  <!-- Page Background Image -->
                  <div>
                    <form enctype="multipart/form-data">
                      <v-img
                        :src="
                          pageBackground
                            ? pageBackground
                            : 'https://cdn.hovia.com/app/uploads/Blue-Illustrated-Landscape-Mountains-Wallpaper-Mural.jpg'
                        "
                        height="200px"
                        class="mb-3"
                      >
                      </v-img>
                      <v-file-input
                        label="Background Image"
                        accept="image/*"
                        v-model="backgroundImage"
                      ></v-file-input>
                    </form>
                  </div>
                  <!-- / Page Background Image -->
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-col cols="12">
                      <v-subheader class="pl-0"> Font size </v-subheader>
                      <v-slider
                        v-model="fontSize"
                        :max="max"
                        :min="min"
                        thumb-label
                      ></v-slider>
                    </v-col>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-col cols="12">
                      <v-subheader class="pl-0"> Font weight </v-subheader>
                      <v-slider
                        v-model="fontWeight"
                        :max="maxfontWeight"
                        :min="minfontWeight"
                        thumb-label
                      ></v-slider>
                    </v-col>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-col cols="12">
                      <v-subheader class="pl-0">
                        Buttons border size
                      </v-subheader>
                      <v-slider
                        v-model="buttonBorderSize"
                        :max="maxbuttonBorderSize"
                        :min="minbuttonBorderSize"
                        thumb-label
                      ></v-slider>
                    </v-col>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-col cols="12">
                      <v-subheader class="pl-0"> Shape of buttons </v-subheader>
                      <v-slider
                        v-model="borderRadius"
                        :max="maxborderRadius"
                        :min="minborderRadius"
                        thumb-label
                      ></v-slider>
                    </v-col>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Icons colors"
                      v-mask="mask6"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu6"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle6" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker v-model="iconColor" flat />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Font color"
                      v-mask="mask"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker v-model="fontColor" flat />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Buttons background"
                      v-mask="mask2"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu2"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle2" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker v-model="buttonBackground" flat />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Buttons border color"
                      v-mask="mask4"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu4"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle4" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker v-model="buttonBorder" flat />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Buttons background on hover"
                      v-mask="mask4"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu3"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle3" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker
                                v-model="buttonBackgroundHover"
                                flat
                              />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Buttons border color on hover"
                      v-mask="mask4"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu5"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle5" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker
                                v-model="buttonBorderHover"
                                flat
                              />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>
                <!-- 
                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-text-field
                    label="Font color on hover"
                    v-model="fontColorHover"
                  ></v-text-field>
                </v-flex> -->

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Font color on hover"
                      v-mask="mask4"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu1"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle1" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker v-model="fontColorHover" flat />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <v-flex xs12 sm12 md12 lg6 xl6 class="px-5">
                  <v-col class="shrink">
                    <v-text-field
                      placeholder="Username font color"
                      v-mask="mask7"
                      hide-details
                      class="ma-0 pa-0"
                      solo
                    >
                      <template v-slot:append>
                        <v-menu
                          v-model="menu8"
                          top
                          nudge-bottom="105"
                          nudge-left="16"
                          :close-on-content-click="false"
                        >
                          <template v-slot:activator="{ on }">
                            <div style="border: 0.7px solid">
                              <div :style="swatchStyle7" v-on="on" />
                            </div>
                          </template>
                          <v-card>
                            <v-card-text class="pa-0">
                              <v-color-picker
                                v-model="usernameFontColor"
                                flat
                              />
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </template>
                    </v-text-field>
                  </v-col>
                </v-flex>

                <br />

                <!-- 

                <div style="display: flex; justify-content: flex-end">
                  <v-btn-toggle>
                    <v-btn
                      target="_blank"
                      :href="'/' + user.username"
                      color="primary accent-3"
                      elevation="0"
                      class="white--text mt-2"
                      small
                      >Preview</v-btn
                    >
                    <v-btn
                      color="success accent-3"
                      elevation="0"
                      class="white--text mt-2"
                      small
                      @click="refreshPreview"
                      >Refresh</v-btn
                    >
                    <v-btn
                      color="cyan accent-3"
                      elevation="0"
                      class="white--text mt-2"
                      small
                      @click="customize"
                      >Save Changes</v-btn
                    >
                  </v-btn-toggle>
                </div> -->

                <div style="display: flex; justify-content: flex-end">
                  <v-btn-toggle>
                    <v-btn
                      target="_blank"
                      :href="'/' + user.username"
                      color="primary accent-3"
                      elevation="0"
                      class="white--text mt-2"
                      large
                      >Preview</v-btn
                    >
                    <v-btn
                      color="success accent-3"
                      elevation="0"
                      class="white--text mt-2"
                      large
                      @click="refreshPreview"
                      >Refresh</v-btn
                    >
                    <v-btn
                      color="cyan accent-3"
                      elevation="0"
                      class="white--text mt-2"
                      large
                      @click="customize"
                      >Save</v-btn
                    >
                  </v-btn-toggle>
                </div>

                <!-- <v-container>
    <v-layout wrap align-content-space-around text-xs-center>
      <v-flex xs3><v-card color="blue"><v-card-text class="px-0">1</v-card-text></v-card></v-flex>
      <v-flex xs3><v-card color="blue"><v-card-text class="px-0">2</v-card-text></v-card></v-flex>
      <v-flex xs3><v-card color="blue"><v-card-text class="px-0">3</v-card-text></v-card></v-flex>
    </v-layout>
</v-container> -->
              </v-layout>
              <br />
            </v-form>
          </v-card-text>
          <v-card-text v-else>
            <p class="text-danger">
              <a href="/upgrade" class="text-decoration-none">Upgrade</a> to PRO
              to customize every detail in your page.
            </p>
          </v-card-text>
        </v-card>
        <!-- / Customization -->

      <!-- / Profile Image Upload -->
      </v-flex>

      <!-- Links Page Preview In Customization Page -->
      <v-flex xs10 sm10 md10 lg5 xl10 row wrap justify-center>
        <iframe
          ref="iframe"
          :src="iframeSrc"
          style="
            width: 500px;
            height: 700px;
            border-radius: 25px;
            border: 0px;
            vertical-align: center;
            text-align: center;
          "
        ></iframe>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import axios from "axios";
import Errors from "../partials/Errors.vue";
import gradients from "./../../../../public/assets/gradients.json";

export default {
  components: { Errors },
  name: "Customization",
  props: ["user"],
  data() {
    return {
      rules: {
        required: (value) => !!value || "Required",
      },
      color: "#76D2FFFF",
      mask: "!#XXXXXXXX",
      mask1: "!#XXXXXXXX",
      mask2: "!#XXXXXXXX",
      mask3: "!#XXXXXXXX",
      mask4: "!#XXXXXXXX",
      mask5: "!#XXXXXXXX",
      mask6: "!#XXXXXXXX",
      mask7: "!#XXXXXXXX",
      menu: false,
      menu1: false,
      menu2: false,
      menu3: false,
      menu4: false,
      menu5: false,
      menu6: false,
      menu7: false,
      min: 0,
      max: 30,
      minfontWeight: 400,
      maxfontWeight: 500,
      minbuttonBorderSize: 0,
      maxbuttonBorderSize: 5,
      maxborderRadius: 0,
      maxborderRadius: 60,

      type: "color",
      valid: false,
      profile: null,
      imageSuccess: false,
      imageFailure: false,
      imageMessage: "",
      imageLoading: false,
      dialog: false,
      fontSize: 15,
      fontWeight: 450,
      fontColor: "",
      fontColorHover: "",
      pageBackground: "",
      buttonBackground: "",
      buttonBackgroundHover: "",
      buttonBorderSize: 2,
      buttonBorderSizeHover: "",
      buttonBorder: "",
      buttonBorderHover: "",
      borderRadius: 0,
      backgroundImage: "",
      iconColor: "",
      usernameFontColor: "",
      customSuccess: false,
      customFailure: false,
      customMessage: "",
      customization: null,
      defaultColor: {
        name: "Mango Pulp",
        colors: ["#F09819", "#EDDE5D"],
      },
      iframeSrc: "/" + this.user.username,
      themesForm: "",
      theme: "",
      light: {
        name: "Light",
        colors: ["ffffff", "#ffffff"],
      },
      blue: {
        name: "Blue",
        colors: ["#17D8E2", "#28abb2"],
      },
    };
  },
  computed: {
    gradients() {
      return gradients;
    },

    swatchStyle() {
      const { fontColor, menu } = this;
      return {
        backgroundColor: fontColor,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle1() {
      const { fontColorHover, menu1 } = this;
      return {
        backgroundColor: fontColorHover,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu1 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle2() {
      const { buttonBackground, menu2 } = this;
      return {
        backgroundColor: buttonBackground,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu2 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle3() {
      const { buttonBackgroundHover, menu3 } = this;
      return {
        backgroundColor: buttonBackgroundHover,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu3 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle4() {
      const { buttonBorder, menu4 } = this;
      return {
        backgroundColor: buttonBorder,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu4 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle5() {
      const { buttonBorderHover, menu5 } = this;
      return {
        backgroundColor: buttonBorderHover,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu5 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle6() {
      const { iconColor, menu6 } = this;
      return {
        backgroundColor: iconColor,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu6 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },

    swatchStyle7() {
      const { usernameFontColor, menu7 } = this;
      return {
        backgroundColor: usernameFontColor,
        cursor: "pointer",
        height: "30px",
        width: "30px",
        borderRadius: menu7 ? "50%" : "0px",
        transition: "border-radius 200ms ease-in-out",
      };
    },
  },
  methods: {
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
    uploadImage() {
      this.imageSuccess = false;
      this.imageFailure = false;
      this.imageMessage = "";
      // Validate the form
      this.$refs.form.validate();
      if (this.valid) {
        this.imageLoading = true;
        let formData = new FormData();
        formData.append("photo", this.profile);
        axios
          .post("/user", formData)
          .then((res) => {
            this.imageLoading = false;
            this.imageSuccess = true;
            this.imageFailure = false;
            this.imageMessage = "Image uploaded successfully.";
            // Refresh the iframe
            this.$refs.iframe.contentWindow.location.reload();
          })
          .catch((err) => {
            this.imageLoading = false;
            this.imageFailure = true;
            this.imageSuccess = false;
            this.imageMessage = "Something went wrong during the upload.";
          });
      }
    },

    refreshPreview() {
      this.$refs.iframe.contentWindow.location.reload();
    },
    customize() {
      let backgroundImage =
        "https://cdn.hovia.com/app/uploads/Blue-Illustrated-Landscape-Mountains-Wallpaper-Mural.jpg";
      // Upload the background image
      if (this.backgroundImage) {
        let backgroundFormData = new FormData();
        backgroundFormData.append("backgroundImage", this.backgroundImage);
        axios
          .post("/customize/backgroundImage", backgroundFormData)
          .then((res) => {
            this.pageBackground = res.data;
            document.location.href = "/customization";
          });
      }
      let customization = {
        fontSize: this.fontSize,
        fontWeight: this.fontWeight,
        fontColor: this.fontColor,
        fontColorHover: this.fontColorHover,
        pageBackground: this.pageBackground,
        buttonBackground: this.buttonBackground,
        buttonBackgroundHover: this.buttonBackgroundHover,
        buttonBorderSize: this.buttonBorderSize,
        buttonBorderSizeHover: this.buttonBorderSizeHover,
        buttonBorder: this.buttonBorder,
        buttonBorderHover: this.buttonBorderHover,
        borderRadius: this.borderRadius,
        iconColor: this.iconColor,
        usernameFontColor: this.usernameFontColor,
      };
      // Update the customization settings
      axios
        .put("/customization", customization)
        .then((res) => {
          this.customSuccess = true;
          this.customFailure = false;
          this.customMessage = "Information updated successfully.";
          this.$refs.iframe.contentWindow.location.reload();
          console.log("refresh 1");
          this.$refs.iframe.contentWindow.location.reload();
          console.log("refresh 2");
        })
        .catch((err) => {
          console.log(err);
          this.customSuccess = false;
          this.customFailure = true;
          this.customMessage = "Something went wrong, Please try again later.";
        });
    },
    saveTheme() {
      this.$refs.themesForm.validate();
      let theme = null;
      if (this.theme == "blue") {
        theme = this.blue;
        theme = {
          pageBackground: this.blue,
          iconColor: "#1a211b",
          fontColor: "#17D8E2",
          fontColorHover: "#c42344",
          buttonBackground: "#ffffff",
          buttonBackgroundHover: "#ffffff",
          buttonBorder: "#17D8E2",
          buttonBorderHover: "#e2c717",
          usernameFontColor: "#ffffff",
          theme_no: "",
        };
      } else {
        theme = this.light;
        theme = {
          fontColor: "#FFFFFF",
          pageBackground: this.light,
          buttonBackgroundHover: "#17D8E2",
          buttonBackground: "#17D8E2",
          iconColor: "#17D8E2",
          buttonborderHover: "#17D8E2",
          usernameFontColor: "#17D8E2",
          theme_no: "",
        };
      }

      //theme properties for Purple Dream
      if (this.theme == "theme_4") {
        theme = this.theme_4;
        theme = {
          pageBackground: "https://www.mataonme.com/assets/images/2_2.png",
          iconColor: "#7834FF",
          usernameFontColor: "#FFFFFF",
          buttonBackgroundHover: "",
          theme_no: "1.1",
        };
      }

        //theme properties for shortcake
        if (this.theme == "themeimage2") {
        theme = this.themeimage2;
        theme = {
          pageBackground: "https://www.mataonme.com/assets/images/3_3.png",
          iconColor: "#d43b24",
          usernameFontColor: "#B47343",
          iconColor: "#B47343",
          theme_no: "2",
          buttonBackground: "",
          buttonBackgroundHover: "",
          buttonborderHover: "",
          buttonBorderSize: 0,
          buttonBorderSizeHover: 0,
          buttonborderHover: "",
        };
      }

      axios
        .put("/change/background", theme)
        .then((res) => {
          // Refresh the iframe
          this.$refs.iframe.contentWindow.location.reload();
        })
        .catch((err) => console.log(err));
    },
    init() {
      axios
        .get(`/customization?user=${this.user.id}`)
        .then((res) => {
          this.customization = res.data;
          (this.fontSize = res.data.fontSize),
            (this.fontWeight = res.data.fontWeight),
            (this.fontColor = res.data.fontColor),
            (this.fontColorHover = res.data.fontColorHover),
            (this.pageBackground = this.isUrl(res.data.pageBackground)
              ? res.data.pageBackground
              : JSON.parse(res.data.pageBackground)),
            (this.buttonBackground = res.data.buttonBackground),
            (this.buttonBackgroundHover = res.data.buttonBackgroundHover),
            (this.buttonBorderSize = res.data.buttonBorderSize),
            (this.buttonBorderSizeHover = res.data.buttonBorderSizeHover),
            (this.buttonBorder = res.data.buttonBorder),
            (this.buttonBorderHover = res.data.buttonBorderHover),
            (this.borderRadius = res.data.borderRadius),
            (this.iconColor = res.data.iconColor);
          this.usernameFontColor = res.data.usernameFontColor;
          if (this.isUrl(res.data.pageBackground)) {
            this.type = "image";
          } else {
            this.type = "color";
          }
        })
        .catch((err) => {
          console.log("Something went wrong");
        });
    },
  },
  created() {
    this.init();
  },
};
</script>

<style>
</style>