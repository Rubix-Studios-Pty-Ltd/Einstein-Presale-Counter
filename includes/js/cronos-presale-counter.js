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
                try {
                    const chainId = await window.ethereum.request({ method: 'eth_chainId' });
                    if (chainId !== '0x19') {
                        try {
                            await window.ethereum.request({ method: 'wallet_switchEthereumChain', params: [{ chainId: '0x19' }] });
                        } catch (error) {
                            console.error('Failed to switch network:', error);
                            return;
                        }
                        window.location.reload();
                    } else {
                        window.web3 = new Web3(window.ethereum);
                        try {
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
                window.web3 = new Web3(window.web3.currentProvider);
            } else {
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
        const totalTokensBigInt = BigInt(totalTokens);
        const croContributedBigInt = BigInt(croContributed);

        const progress = (Number(croContributedBigInt * BigInt(100)) / Number(totalTokensBigInt)).toFixed(2);
        const now = new Date().getTime();
        const saleEndDate = new Date(Number(saleEndTimestamp) * 1000).getTime();
        const timeLeft = saleEndDate - now;

        const currentTime = Math.floor(Date.now() / 1000);

        if (saleStartTimestamp > currentTime) {
            document.getElementById('contribute-button').disabled = true;
            document.getElementById('countdown-days').textContent = "00";
            document.getElementById('countdown-hours').textContent = "00";
            document.getElementById('countdown-minutes').textContent = "00";
            document.getElementById('countdown-seconds').textContent = "00";
        } else if (currentTime >= saleEndTimestamp) {
            document.getElementById('contribute-button').disabled = true;
            document.getElementById('countdown-days').textContent = "00";
            document.getElementById('countdown-hours').textContent = "00";
            document.getElementById('countdown-minutes').textContent = "00";
            document.getElementById('countdown-seconds').textContent = "00";
            document.getElementById('sale-not-started').style.display = 'none';
        } else {
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

        const croContributedText = croContributedBigInt.toString() === '0' ? '0' : web3.utils.fromWei(croContributedBigInt.toString(), 'ether');

        document.querySelector('.progress').style.width = `${progress}%`;
        document.getElementById('cro-contributed').textContent = `${croContributedText}`;
    }
    fetchData();
    setInterval(fetchData, 15000);
})();