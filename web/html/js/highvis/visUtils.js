// Generated by CoffeeScript 1.3.3

/*
 * Copyright (c) 2011, iSENSE Project. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this
 * list of conditions and the following disclaimer. Redistributions in binary
 * form must reproduce the above copyright notice, this list of conditions and
 * the following disclaimer in the documentation and/or other materials
 * provided with the distribution. Neither the name of the University of
 * Massachusetts Lowell nor the names of its contributors may be used to
 * endorse or promote products derived from this software without specific
 * prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 *
*/


(function() {
  var addRadialMarkerStyle, direction, fanMagList, halfmoonMagList, i, index, phase, pieMagList, symbolList, tempSymbolsMatrix, tempSymbolsMatrixCount, windmillLeftMagList, windmillRightMagList, _i, _j, _k, _l, _len, _len1, _len2, _len3, _len4, _len5, _m, _n, _o, _ref, _ref1, _ref2, _ref3, _ref4, _ref5, _ref6, _ref7, _ref8, _ref9;

  if ((_ref = window.globals) == null) {
    window.globals = {};
  }

  /*
  Removes 'item' from the array 'arr'
  Returns the modified (or unmodified) arr.
  */


  window.arrayRemove = function(arr, item) {
    var index;
    index = arr.indexOf(item);
    if (index !== -1) {
      arr.splice(index, 1);
    }
    return arr;
  };

  /*
  This function adds a parameterizable radial marker to Highchart's list of
  marker styles.
  */


  addRadialMarkerStyle = function(name, points, phase, magnitudes) {
    var extension;
    if (magnitudes == null) {
      magnitudes = [1];
    }
    extension = {};
    extension[name] = function(x, y, w, h) {
      var i, modpoints, offset, svg, tx, ty, verticies, vx, vy, _i, _j, _len, _ref1;
      svg = Array();
      verticies = Array();
      offset = phase * 2 * Math.PI;
      modpoints = points * magnitudes.length;
      for (i = _i = 0; 0 <= modpoints ? _i <= modpoints : _i >= modpoints; i = 0 <= modpoints ? ++_i : --_i) {
        tx = (Math.sin(2 * Math.PI * i / modpoints + offset)) * magnitudes[i % magnitudes.length];
        ty = (Math.cos(2 * Math.PI * i / modpoints + offset)) * magnitudes[i % magnitudes.length];
        tx = tx / 2 + 0.5;
        ty = ty / 2 + 0.5;
        verticies.push([tx * w + x, ty * h + y]);
      }
      svg.push("M");
      svg.push(verticies[0][0]);
      svg.push(verticies[0][1]);
      svg.push("L");
      for (_j = 0, _len = verticies.length; _j < _len; _j++) {
        _ref1 = verticies[_j], vx = _ref1[0], vy = _ref1[1];
        svg.push(vx);
        svg.push(vy);
      }
      svg.push("Z");
      return svg;
    };
    return Highcharts.extend(Highcharts.Renderer.prototype.symbols, extension);
  };

  /*
  Generated using http://jiminy.medialab.sciences-po.fr/tools/palettes/palettes.php
  Colors: 30
  Hue:       0.0 - 360.00
  Chroma:    0.0 -   1.70
  Lightness: 0.3 -   0.95
  K-means
  */


  globals.colors = ['#5E5A83', '#609B36', '#DC644F', '#9A8867', '#DA6694', '#40938C', '#A78E20', '#884646', '#546222', '#688CCF', '#529F69', '#415B62', '#AE8188', '#D1762F', '#408FB2', '#B18347', '#944B70', '#9F7FBC', '#C77967', '#914C2A', '#396B43', '#625744', '#C25562', '#735521', '#7D9080', '#715365', '#8A9044', '#C573B2', '#788AA2', '#EC5D7A'];

  /*
  Generate a list of symbols and symbol rendering routines and then add them
  in an order that is clear and easy to read.
  */


  fanMagList = [1, 1, 15 / 16, 7 / 8, 3 / 4, 1 / 4, 1 / 4, 3 / 4, 7 / 8, 15 / 16, 1];

  windmillLeftMagList = [1, 1 / 2, 1 / 3, 1 / 4];

  windmillRightMagList = [1 / 4, 1 / 3, 1 / 2, 1];

  pieMagList = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0];

  halfmoonMagList = [1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0];

  tempSymbolsMatrix = [];

  symbolList = ['circle', 'square', 'up-tri', 'down-tri', 'left-tri', 'right-tri', 'diamond'];

  globals.dashes = ['solid', 'Dot', 'ShortDot', 'DashDot', 'ShortDashDot'];

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  addRadialMarkerStyle("blank", 1, 0, [0]);

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  _ref1 = [2, 3, 4, 6, 10];
  for (_i = 0, _len = _ref1.length; _i < _len; _i++) {
    i = _ref1[_i];
    addRadialMarkerStyle("" + i + "-fan", 3, 0, fanMagList);
    tempSymbolsMatrix[tempSymbolsMatrix.length - 1].push("" + i + "-fan");
  }

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  _ref2 = [[0, "down"], [1 / 4, "right"], [2 / 4, "up"], [3 / 4, "left"]];
  for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {
    _ref3 = _ref2[_j], phase = _ref3[0], direction = _ref3[1];
    addRadialMarkerStyle("" + direction + "-tri", 3, phase);
  }

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  _ref4 = [2, 3, 4, 6];
  for (_k = 0, _len2 = _ref4.length; _k < _len2; _k++) {
    i = _ref4[_k];
    addRadialMarkerStyle("" + i + "-windmillLeft", i, 0, windmillLeftMagList);
    tempSymbolsMatrix[tempSymbolsMatrix.length - 1].push("" + i + "-windmillLeft");
  }

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  _ref5 = [1, 2, 3, 4, 5, 6, 10, 20];
  for (_l = 0, _len3 = _ref5.length; _l < _len3; _l++) {
    i = _ref5[_l];
    addRadialMarkerStyle("" + i + "-pie", i, 0, pieMagList);
    tempSymbolsMatrix[tempSymbolsMatrix.length - 1].push("" + i + "-pie");
  }

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  _ref6 = [[0, "right"], [1 / 4, "up"], [2 / 4, "left"], [3 / 4, "down"]];
  for (_m = 0, _len4 = _ref6.length; _m < _len4; _m++) {
    _ref7 = _ref6[_m], phase = _ref7[0], direction = _ref7[1];
    addRadialMarkerStyle("" + direction + "-halfmoon", 1, phase, halfmoonMagList);
    tempSymbolsMatrix[tempSymbolsMatrix.length - 1].push("" + direction + "-halfmoon");
  }

  tempSymbolsMatrix[tempSymbolsMatrix.length] = [];

  _ref8 = [2, 3, 4, 6];
  for (_n = 0, _len5 = _ref8.length; _n < _len5; _n++) {
    i = _ref8[_n];
    addRadialMarkerStyle("" + i + "-windmillRight", i, 0, windmillRightMagList);
    tempSymbolsMatrix[tempSymbolsMatrix.length - 1].push("" + i + "-windmillRight");
  }

  while (tempSymbolsMatrixCount !== 0) {
    tempSymbolsMatrixCount = tempSymbolsMatrix.length;
    for (index = _o = 0, _ref9 = tempSymbolsMatrix.length; 0 <= _ref9 ? _o < _ref9 : _o > _ref9; index = 0 <= _ref9 ? ++_o : --_o) {
      if (tempSymbolsMatrix[index].length === 0) {
        tempSymbolsMatrixCount -= 1;
      } else {
        symbolList.push(tempSymbolsMatrix[index][0]);
        tempSymbolsMatrix[index].splice(0, 1);
      }
    }
  }

  /*
  Store the list
  */


  globals.symbols = symbolList;

}).call(this);
