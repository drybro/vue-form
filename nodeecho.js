const http = require('http');
const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
    const { headers, method, url } = req;
    const ContentType = req.headers['content-type'];
    let body = [];
    req.on('error', err => { console.error(err); })
      .on('data', chunk => { body.push(chunk); })
      .on('end', () => {
        body = Buffer.concat(body).toString();
	      res.statusCode = 200;
	      res.setHeader('Content-Type', 'application/json');
	      res.setHeader('Access-Control-Allow-Origin', '*');
        const out = JSON.stringify({url, method, ContentType, body});
	      res.end(out);
      });
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
