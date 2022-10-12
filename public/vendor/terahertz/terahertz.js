document.addEventListener('alpine:init', () => {

    Alpine.store('terahertzStore', {
        walletAddress: Alpine.$persist(''),
        walletConnected: Alpine.$persist(false),
    
        setAddress(address){
            this.walletAddress = address;
        },  
        getAddress(){
            return this.walletAddress;
        },
    
        getConnected(){
            return this.walletConnected;
        },
    
        setConnected(){
            this.walletConnected = 'true';
        },
        
        disconnect(){
            this.walletConnected = false;
        }
    });
 
    Alpine.data('terahertzLogin', () => ({
        walletContext: '',
        error: '',
        walletConnected: false,
        loggedIn: false,
        showError: false,
        ergBalance: 0,
        NANOERG_TO_ERG: 1000000000,


        // Click Events
        login: {
            ['@click']() {
                this.connect();                    
            },
        },

        connectWallet: {
            ['@click'](){
                this.checkWallet();
            }
        },
        disconnectWallet: {
            ['@click'](){
                this.disconnect();
            }
        },


        //
        //
        // Connect Wallet Functions
        checkWallet(){
            if (!window.ergoConnector) {
                this.errorHandle('fail', 'There is no Nautilus Wallet on this browser');
            } else {
                this.connectNautilusWallet();
            }
        },

        async connectNautilusWallet(){
            console.log('connect Nautilus Wallet');
            const al = this;
            window.ergoConnector.nautilus.connect().then((access_granted) => {
                if (access_granted) {
                    al.walletConnected = 'true'; // we connected
                    window.ergoConnector.nautilus.getContext().then((context) => {
                        al.checkBalance(context);
                        
                        context.get_change_address().then(function (address) {
                            al.walletAddress = address; // we have an address
                            Alpine.store('terahertzStore').setAddress(address);
                            Alpine.store('terahertzStore').setConnected();
                            al.walletConnected = true;                           
                        });
                    });

                } else {
                    al.walletConnected = false;
                    al.errorHandle('fail', 'could not connect');
                }
            });
        },

        checkBalance(context){
            const al = this;
            context.get_balance().then(function (balance) {
                al.ergBalance = balance / al.NANOERG_TO_ERG;
            });
        },

        disconnect(){
            if (typeof window.ergo_request_read_access === "undefined") {
                // Do nothing
            } else {
            if (Alpine.store('terahertzStore').getConnected()) {
                Alpine.store('terahertzStore').disconnect();
                this.walletContext = '';
                Alpine.store('terahertzStore').setAddress('');
                window.ergoConnector.nautilus.disconnect();
            }
            }
        },




        //
        //
        // Full Laravel Auth with Nautilus

        /**
         * Connect to the wallet and start the auth process
         */
        connect(){
            let al = this;
            if (!window.ergoConnector) {
                this.errorHandle('fail', 'There is no Nautilus Wallet on this browser');
            }
            window.ergoConnector.nautilus.connect().then((access_granted) => {
                if (access_granted) {
                    al.walletConnected = 'true'; // we connected
                    window.ergoConnector.nautilus.getContext().then((context) => {
                        al.balance = al.checkBalance(context);
                        
                        context.get_change_address().then(function (address) {
                            al.walletAddress = address; // we have an address
                            Alpine.store('terahertzStore').setAddress(address);
                            Alpine.store('terahertzStore').setConnected();
                            
                            // Generate message and pass to Auth function
                            const message = crypto.randomUUID();
                            al.ergoAuth(context, address, message);
                        });
                    });

                } else {
                    al.walletConnected = false;
                    al.errorHandle('fail', 'could not connect');
                }
            });
        },

        /**
         * Request the users sending pw via Nautilus Browser addon and then Login that user to the Terahertz platform via full web2 auth.
         * @param  {[object]} context This is the context from ergoConnector
         * @param  {[string]} address The wallet address from the wallet that is being connected
         * @param  {[string]} message This is a random value from: crypto.randomUUID()
         */
        async ergoAuth(context, address, message){
            const response = await context.auth(address, message);
            console.log(response);

            axios.post('/test-login', {
                    address: address,
                    proof: response.proof,
                    signedMessage: response.signedMessage
                })
                .then(function (response) {
                    console.log(response.data);
                    window.location.href = response.data.url;
                })
                .catch(function (error) {
                    console.log(error);
                    //this.errorHandle('fail', 'Something went wrong.')
                });
        },


        //
        //
        // Error Handling
        errorHandle(type, msg){
            this.error = msg;
            this.showError = true;
        }
    }));
})


// Clear browser on logout = TO DO this should be done if the person clears
let params = (new URL(document.location)).searchParams;
if(params.has('clear-wallet') === true){
    Alpine.store('nautilusStore').disconnect();
    Alpine.store('nautilusStore').setAddress('');
}

