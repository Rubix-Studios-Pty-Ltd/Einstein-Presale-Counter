(async () => {
    const provider = new Web3.providers.HttpProvider('https://evm.cronos.org/', {
        keepAlive: true,
        cors: true,
        headers: [
          { name: 'Content-Type', value: 'application/json' },
        ],
      });
    const web3 = new Web3(provider);

    const contractAddress = '0x7A203020bf188A0dC5948A5125722789CAd63CF2';
    const abi = [
        {
            "inputs": [],
            "name": "totalSupply",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "stateMutability": "view",
            "type": "function",
            "name": "CROcontributed",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ]
        },
        {
            "inputs": [],
            "stateMutability": "view",
            "type": "function",
            "name": "saleendtimestamp",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ]
        },
        {
            "inputs": [],
            "stateMutability": "view",
            "type": "function",
            "name": "salestarttimestamp",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ]
        }
    ];

    const contract = new web3.eth.Contract(abi, contractAddress);

    document.getElementById('contribute-button').addEventListener('click', async () => {
        try {
            if (typeof window.ethereum !== 'undefined') {
                // Modern dapp browsers...
                console.log('Modern dapp browser detected.');
                // Check if MetaMask is connected to the Cronos network
                try {
                    const chainId = await window.ethereum.request({ method: 'eth_chainId' });
                    if (chainId !== '0x19') {
                        // Prompt user to switch to Cronos network
                        try {
                            await window.ethereum.request({ method: 'wallet_switchEthereumChain', params: [{ chainId: '0x19' }] }); // Cronos chainId
                        } catch (error) {
                            console.error('Failed to switch network:', error);
                            return;
                        }
                        // Reload the page after switching network
                        window.location.reload();
                    } else {
                        // MetaMask is already connected to Cronos, proceed with initialization
                        window.web3 = new Web3(window.ethereum);
                        try {
                            // Request account access if needed
                            await window.ethereum.request({ method: 'eth_requestAccounts' });
                        } catch (error) {
                            console.error('User denied account access');
                            return;
                        }
                    }
                } catch (error) {
                    console.error('Error fetching chainId:', error);
                    return;
                }
            } else if (typeof window.web3 !== 'undefined') {
                // Legacy dapp browsers...
                console.log('Legacy dapp browser detected.');
                window.web3 = new Web3(window.web3.currentProvider);
            } else {
                // Fallback to the HTTP provider if no injected provider is detected
                console.log('No web3 instance injected, using Cronos HTTP provider.');
                const provider = new Web3.providers.HttpProvider('https://evm.cronos.org/', {
                    keepAlive: true,
                    cors: true,
                    headers: [
                      { name: 'Content-Type', value: 'application/json' },
                    ],
                  });
                window.web3 = new Web3(provider);
            }

            const contractAddress = '0x7A203020bf188A0dC5948A5125722789CAd63CF2';
            const abi = [
                {
                    "inputs":[],
                    "name":"ein",
                    "outputs":[],
                    "stateMutability":"payable",
                    "type":"function"
                }
            ];
        
            const contract = new web3.eth.Contract(abi, contractAddress);
            const response = await fetch('https://rest.cronos.org/ethermint/evm/v1/base_fee');
            const data = await response.json();
            const gasPriceWei = data.base_fee;
            
            const amountInput = document.getElementById('contribution-amount');
            const amount = amountInput.value;
            const amountInWei = web3.utils.toWei(amount, 'ether');
            const gasLimit = Math.ceil(gasPriceWei * 0.005);
        
            await contract.methods.ein().send({
              from: account,
              value: amountInWei,
              gas: gasLimit,
              gasPrice: gasPriceWei
            });
        
            alert('Contribution successful!');
          } catch (error) {
            console.error(error);
            alert('An error occurred. Please try again');
          }
    });

    async function fetchData() {
        const totalTokens = await contract.methods.totalSupply().call();
        const croContributed = await contract.methods.CROcontributed().call();
        const saleEndTimestamp = await contract.methods.saleendtimestamp().call();
        const saleStartTimestamp = await contract.methods.salestarttimestamp().call();

        // Convert the values to BigInt
        const totalTokensBigInt = BigInt(totalTokens);
        const croContributedBigInt = BigInt(croContributed);

        // Calculate the progress
        const progress = (Number(croContributedBigInt * BigInt(100)) / Number(totalTokensBigInt)).toFixed(2);

        // Calculate countdown
        const now = new Date().getTime();

        const saleEndDate = new Date(Number(saleEndTimestamp) * 1000).getTime();
        const timeLeft = saleEndDate - now;

        const currentTime = Math.floor(Date.now() / 1000); // get current timestamp in seconds

        if (saleStartTimestamp > currentTime) {
            // sale hasn't started yet, disable the button and reset countdown
            document.getElementById('contribute-button').disabled = true;
            document.getElementById('countdown-days').textContent = "00";
            document.getElementById('countdown-hours').textContent = "00";
            document.getElementById('countdown-minutes').textContent = "00";
            document.getElementById('countdown-seconds').textContent = "00";
          } else if (currentTime >= saleEndTimestamp) {
            // sale has ended, disable the button and reset countdown
            document.getElementById('contribute-button').disabled = true;
            document.getElementById('countdown-days').textContent = "00";
            document.getElementById('countdown-hours').textContent = "00";
            document.getElementById('countdown-minutes').textContent = "00";
            document.getElementById('countdown-seconds').textContent = "00";
            document.getElementById('sale-not-started').style.display = 'none';
           } else {
            // sale has started and hasn't ended, enable the button and update countdown
            document.getElementById('contribute-button').disabled = false;
            document.getElementById('sale-not-started').style.display = 'none';
            if (timeLeft > 0) {
              const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
              const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
              const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
          
              document.getElementById('countdown-days').textContent = days.toString().padStart(2, '0');
              document.getElementById('countdown-hours').textContent = hours.toString().padStart(2, '0');
              document.getElementById('countdown-minutes').textContent = minutes.toString().padStart(2, '0');
              document.getElementById('countdown-seconds').textContent = seconds.toString().padStart(2, '0');
            } else {
              document.getElementById('countdown-days').textContent = "00";
              document.getElementById('countdown-hours').textContent = "00";
              document.getElementById('countdown-minutes').textContent = "00";
              document.getElementById('countdown-seconds').textContent = "00";
            }
          }

        // Set the text content of the element with id 'cro-contributed'
        const croContributedText = croContributedBigInt.toString() === '0' ? '0' : web3.utils.fromWei(croContributedBigInt.toString(), 'ether');

        // Update the presale counter template
        document.querySelector('.progress').style.width = `${progress}%`;

        // Set the text content of the element with id 'cro-contributed'
        document.getElementById('cro-contributed').textContent = `${croContributedText}`;
    }

    // Call fetchData immediately on page load
    fetchData();

    // Set up an interval to call fetchData every 15 seconds
    setInterval(fetchData, 15000);
})();