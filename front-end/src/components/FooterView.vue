<template>
    <div>
        <div class="footer">
            <div class="fo-row1">
                <div class="fo-col">
                    <div class="fo-cont" >
                        <strong>Rent Me Now</strong>
                        <div class="h-line"></div>
                        <p>Find all the dental care you need (and then some) here in our beautiful office, designed for your comfort and rejuvenation.</p>
                        <div class="social">
                            <a href="https://2u.pw/xX5YK" target="_alert"><FIcons :icon="['fab','youtube'] " /></a>
                            <a href="https://2u.pw/8hQ2t" target="_alert"><FIcons :icon="['fab','twitter'] " /></a>
                            <a href="https://www.instagram.com/youcodeschool/" target="_alert"><FIcons :icon="['fab','instagram'] " /></a>
                            <a href="https://www.facebook.com/YouCodeSchool" target="_alert"><FIcons :icon="['fab','facebook'] " /></a>
                        </div>
                    </div>
                </div>
                <div class="fo-col">
                    <div class="fo-cont" >
                        <strong>Company</strong>
                        <div class="h-line"></div>
                        <div class="fo-ul">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our services</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="fo-col">
                    <div class="fo-cont">
                        <strong>Get Help</strong>
                        <div class="h-line"></div>
                        <div class="fo-ul">
                            <ul>
                                <li><a href="#">F&Q</a></li>
                                <li><a href="#">Order Option</a></li>
                                <li><a href="#">Payment Options</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fo-col">
                    <div class="fo-cont">
                        <strong>My Account</strong>
                        <div class="h-line"></div>
                        <div class="fo-ul">
                            <ul>
                                <li><a href="#">Sign In/Register</a></li>
                                <li><a href="#">My Wichlist</a></li>
                                <li><a href="#">My Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy">
                <h2> &copy; 2021 Rent Me Now All Rights Reserved</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FooterView',
}
</script>

<style scoped>

.footer{
    width: 100%;
    background-color: #064663;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 30px;
    padding: 20px 0px 10px 0px;
}
.fo-row1{
    width: 100%;
    height: 70%;
    display: flex;
    justify-content: space-evenly;
}
.fo-col{
    width: 23%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.fo-cont{
    width: 90%;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 20px;  
}
.fo-cont Strong{
    font-family: 'poppins';
    font-size: 1rem;
    color: #fff;
}
.h-line{
    width: 90%;
    height: 1.5px;
    background: #fff;
}
.fo-cont p{
    color: #fff;
}
.social{
    width: 100%;
    height: auto;
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 1.5rem;
}
.social a{
    color: #fff;
    /* background-color: #04293A; */
    width: 20%;
    height: auto;
    text-align: center;
    line-height: 50px;
    border-radius: 50%;
	transition: all 0.5s ease-in-out;
}
.social a:hover{
    transform: translateY(-3px);
}
.fo-ul{
    width: 100%;
    height: 60%;
    list-style: none;
}
.fo-ul ul {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.fo-ul ul li{
    width: 100%;
    display: flex;
    flex-direction: column;
}
.fo-ul ul li a{
    text-decoration: none;
    color: #fff;
	transition: all 0.2s ease;
}
.fo-ul ul li a:hover{
    padding-left: 8px;
    color: #9A0680;
}
.copy{
    width: 100%;
    height: 10vh;
    text-align: center;
}
.copy h2{
    font-family: 'poppins';
    font-size: 1rem;
    color: #fff;
}

@media (max-width: 800px){
    .footer{
        display: flex;
        flex-direction: column;
    }
    .fo-row1{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 40px;
    }
    .fo-col{
        width: 100%;
    }  
}

</style>

