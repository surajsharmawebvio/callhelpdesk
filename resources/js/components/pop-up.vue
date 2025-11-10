<!-- Banner pop-up component (uses v-model: modelValue for visibility) -->
<template>
  <div class="pop-up" v-if="isVisible">
    <div class="pop-up-content">
      <button class="close-button" @click="closePopUp" aria-label="Close popup">&times;</button>

      <div class="banner">
        <h2>Hey! We’re here to guide you through your booking journey</h2>
        <p class="sub">Don’t Let These Deals Fly Away!</p>

        <div class="phone-box">
          <img src="https://flagcdn.com/w40/us.png" alt="US Flag">
          +88(09) 53 33 09
        </div>

        <div class="or">or</div>

        <button class="call-btn" @click="$emit('request-call')">
          <i class="fa fa-phone" aria-hidden="true"></i>
          Request a Call Back
        </button>

        <div class="footer">
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/IATA_logo.svg" alt="IATA">
          <img src="https://upload.wikimedia.org/wikipedia/commons/1/1d/CLIA_logo.svg" alt="CLIA">
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/3d/Asta-logo.png" alt="ASTA">
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Trustpilot_logo.svg" alt="Trustpilot">
        </div>

        <div class="socials">
          <a href="#" aria-label="facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="twitter"><i class="fab fa-x-twitter"></i></a>
          <a href="#" aria-label="youtube"><i class="fab fa-youtube"></i></a>
          <a href="#" aria-label="linkedin"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PopUp',
  props: {
    // Use v-model:modelValue on the component to control visibility
    modelValue: {
      type: Boolean,
      default: false
    }
  },
  emits: ['update:modelValue', 'request-call'],
  computed: {
    isVisible: {
      get() {
        return this.modelValue;
      },
      set(val) {
        this.$emit('update:modelValue', val);
      }
    }
  },
  methods: {
    closePopUp() {
      this.isVisible = false;
    }
  }
};
</script>

<style scoped>
/* Modal backdrop */
.pop-up {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.55);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  padding: 20px;
}

.pop-up-content {
  position: relative;
  max-width: 900px;
  width: 100%;
  background: transparent; /* banner has its own background */
}

.close-button {
  position: absolute;
  right: 8px;
  top: -8px;
  background: #fff;
  border-radius: 50%;
  border: none;
  width: 40px;
  height: 40px;
  font-size: 24px;
  line-height: 1;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* Banner styles adapted from pop-up.html (scoped) */
.banner {
  background: linear-gradient(180deg, #fff 0%, #fff 100%);
  border-radius: 16px;
  border: 2px solid #e69c24;
  box-shadow: 0 8px 30px rgba(0,0,0,0.15);
  color: #333;
  padding: 28px 24px;
  text-align: center;
}

.banner h2 {
  margin: 0 0 8px 0;
  font-size: 22px;
  color: #2f2f2f;
}
.banner .sub {
  margin: 0 0 18px 0;
  font-size: 16px;
  color: #e88a13;
  font-weight: 600;
}

.phone-box {
  background: #1a73e8;
  color: white;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 12px 20px;
  border-radius: 12px;
  font-size: 18px;
  font-weight: 600;
  box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}
.phone-box img { width: 28px; height: 18px; border-radius: 3px; }

.or { margin: 16px 0; font-size: 16px; font-weight: 500; color: #444; }

.call-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #f78c1e;
  color: white;
  border: none;
  padding: 12px 22px;
  border-radius: 12px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}
.call-btn:hover { background: #d67814; }
.call-btn i { font-style: normal; }

.footer { display:flex; justify-content:center; gap:14px; align-items:center; margin-top:18px; flex-wrap:wrap; }
.footer img { height: 34px; }

.socials { display:flex; gap:12px; margin-top:12px; justify-content:center }
.socials a { color: #fff; background:#1877f2; width:36px; height:36px; display:flex; align-items:center; justify-content:center; border-radius:50%; text-decoration:none }
.socials a:nth-child(2){ background:#e1306c }
.socials a:nth-child(3){ background:#000 }
.socials a:nth-child(4){ background:#ff0000 }
.socials a:nth-child(5){ background:#0077b5 }

/* small responsive tweaks */
@media (max-width:600px){
  .banner h2 { font-size:18px }
  .phone-box { padding:10px 14px; font-size:16px }
}
</style>