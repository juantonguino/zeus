"use strict";importScripts("../components/lunr.js-0.5.12/lunr.min.js");var index=lunr(function(){this.ref("path"),this.field("titleWords",{boost:50}),this.field("members",{boost:40}),this.field("keywords",{boost:20})}),searchData={},searchDataRequest=new XMLHttpRequest;searchDataRequest.onload=function(){searchData=JSON.parse(this.responseText),searchData.forEach(function(e){index.add(e)}),postMessage({e:"index-ready"})},searchDataRequest.open("GET","search-data.json"),searchDataRequest.send(),onmessage=function(e){var s=e.data.q,a=index.search(s),t=[];a.forEach(function(e){t.push(e.ref)}),postMessage({e:"query-ready",q:s,d:t})};
//# sourceMappingURL=search-worker.min.js.map
