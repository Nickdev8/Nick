const message = `
Please generate a witty, funny sentence about Nick.

Context:
Nick is a quirky genius who codes, prints 3D, explores VR, and rocks web dev at Hack Club. He mixes smarts with humor.

Use <br> tags for line breaks and keep it under 10 words.
`;

async function callAIHackClubAPI(content) {
    try {
        const response = await fetch('https://ai.hackclub.com/chat/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                messages: [{ role: 'user', content: content }]
            })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        return JSON.stringify(data, null, 2);
    } catch (error) {
        console.error('Error:', error);
        return null;
    }
}

function callAIHackClubAPIfake(content) {
    const fakeResponse = { choices: [{ message: { content: content } }] };
    return JSON.stringify(fakeResponse, null, 2);
}

async function main() {
    const aiText = document.getElementById('js--ai-Message');
    aiText.innerHTML = 'Loading...';

    const result = await callAIHackClubAPI(message);
    const json = JSON.parse(result);
    console.log(json);
    aiText.innerHTML = result ? json.choices[0].message.content + '<br><br>' : 'An error occurred.';
}

main();